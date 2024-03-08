<?php

namespace App\Http\Controllers;

use App\Models\autonotif;
use App\Models\company_mib;
use App\Models\list_packet;
use App\Models\ListBank;
use App\Models\log_activity;
use App\Models\referal_bank_packet;
use App\Models\riwayat_pembelian;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PDF;
use Whoops\Run;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {
            $bank = ListBank::all()->where('uid', Auth::user()->email);
            Auth::user()->name = ucwords(Auth::user()->name);

            return view('user.layanan_mutasi', ['bank' => $bank]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $harga = ltrim($request->harga, "Rp ");

        $data_paket = list_packet::all()
            ->where('id', $request->paket)
            ->where('harga', $harga)
            ->where('status', "aktif")
            ->first();

        if ($data_paket == NULL) {
            return "null_packet";
        }

        $durasi = 1;
        $id_paket = "-";

        if ($data_paket->jenis == "harian") {
            $id_paket = $data_paket->id;
        } else {
            $durasi = $data_paket->durasi;
        }

        if (Auth::user()->saldo < $harga) {
            return "null_saldo";
        }

        $ref_bank = referal_bank_packet::all()->where('referal_id', $data_paket->id);

        // Validate service
        $validate_service = 0;
        foreach ($ref_bank as $key) {
            if ($key->service == $request->service) {
                $validate_service = 1;
            }
        }

        if ($validate_service == 0) {
            return "null_service";
        }

        date_default_timezone_set("Asia/Jakarta");
            $time = Carbon::now();
            $time->setTimezone('Asia/jakarta');
            $time->format('YYYY-MM-DD hh:mm:ss');

            $time_now = Carbon::now();
            $time_now->setTimezone('Asia/jakarta');
            $time_now->format('YYYY-MM-DD hh:mm:ss');

        // ---------------
            // BEGIN Data Bank
            // ---------------

            $add = new ListBank;
            $add->uid = Auth::user()->email;
            $add->service = $request->service;
            $add->no_rekening = $request->no_rekening;
            $add->username_ibank = encrypt($request->username);
            $add->password_ibank = encrypt($this->delete_space($request->password));
            $add->status = "baru";
            $add->harga = $harga;
            $add->jenis = $data_paket->jenis;
            $add->nama_paket = $data_paket->nama_paket;
            $add->referal_paket_id = $id_paket;
            $add->date = $time_now;
            $add->date_expired = $time->addDay($durasi);
            $add->save();

            if ($request->service == "MANDIRI") {
                $company = new company_mib;
                $company->uid = Auth::user()->email;
                $company->referal_rekening = $add->id;
                $company->company_id = $request->company;
                $company->save();
            }

            $saldo = User::all()->where('email', Auth::user()->email)->first();
            $saldo->saldo = $saldo->saldo - $harga;
            $saldo->save();

            // ----------------
            // END Data Bank
            // ----------------

            // -----------------
            // BEGIN Buy History
            // -----------------

            $time_history = Carbon::now();
            $time_history->setTimezone('Asia/jakarta');
            $time_history->format('YYYY-MM-DD hh:mm:ss');

            $riwayat_pembelian = new riwayat_pembelian;
            $riwayat_pembelian->uid = Auth::user()->email;
            $riwayat_pembelian->nama_paket = $data_paket->nama_paket;
            $riwayat_pembelian->service = $request->service;
            $riwayat_pembelian->no_rekening = $request->no_rekening;
            $riwayat_pembelian->harga = $data_paket->harga;
            $riwayat_pembelian->jenis = $data_paket->jenis;
            $riwayat_pembelian->durasi = $data_paket->durasi;
            $riwayat_pembelian->tgl_pembelian = $time_history;
            $riwayat_pembelian->status = "berhasil";
            $riwayat_pembelian->save();

            // -----------------
            // END Buy History
            // -----------------

            $user = User::all()->where('email', Auth::user()->email)->first();
            $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();
            $message_bank = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'add_bank')->first();

            if (
                $admin->status == "aktif" &&
                $message_bank->status == "aktif" &&
                $user->notif_wa == "aktif"
            ) {
                $change_message = $this->notif_add_bank($message_bank->message, $add, $riwayat_pembelian);
                $this->notif($admin->username, $user->no_hp, $change_message, $admin->api_key);
            }

        return "berhasil";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ListBank::all()->where('uid', Auth::User()->email)->where('id', $request->id)->first();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $from = date($request->start);
        $to = date($request->end);
        $rekening = transaksi::all()
            ->where('uid', Auth::user()->email)
            ->where('no_rekening', $request->rekening)
            ->where('referal_bank', $request->referal_id);
        if ($request->start == "all" && $request->end == "all") {
            $rekening = transaksi::all()
                ->where('uid', Auth::user()->email)
                ->where('no_rekening', $request->rekening)
                ->where('referal_bank', $request->referal_id)
                ->sortByDesc('tgl_transaksi');
        } else {
            $rekening = transaksi::all()
                ->where('uid', Auth::user()->email)
                ->where('no_rekening', $request->rekening)
                ->where('referal_bank', $request->referal_id)
                ->sortByDesc('tgl_transaksi')
                ->whereBetween('tgl_transaksi', [$from, $to]);
        }

        $array = [];
        $cek = 1;
        $array[0] = count($rekening);
        foreach ($rekening as $data) {
            $data2 = new transaksi;
            $data2->id = $data->id;
            $data2->no_rekening = $data->no_rekening;
            $data2->service = $data->service;
            $data2->deskripsi = $data->deskripsi;
            $data2->tipe = $data->tipe;
            $data2->tgl_transaksi = $data->tgl_transaksi;
            $data2->nominal = $data->nominal;
            $array[$cek] = $data2;
            $cek++;
        }

        return Response()->json($array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $bank = ListBank::all()
            ->where('id', $request->id)
            ->where('uid', Auth::user()->email)
            ->first();

        try {
            $bank->username_ibank = decrypt($bank->username_ibank);
        } catch (\Throwable $th) {
            $bank->username_ibank = "Perbarui";
        }

        try {
            $bank->password_ibank = decrypt($bank->password_ibank);
        } catch (\Throwable $th) {
            $bank->password_ibank = "Perbarui";
        }

        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $expired = strtotime($bank->date_expired);
        $buy = strtotime($bank->date);
        $different_on_minutes = ($expired - $buy) / 60;
        $different_on_day = $different_on_minutes / 1440;
        $bank->durasi = $different_on_day;

        if ($bank->service == "MANDIRI") {
            $company = company_mib::all()->where('referal_rekening', $bank->id)->first();
            return array($bank, $company);
        } else {
            return array($bank);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return "berhasil";
        $url_token_mib = env('API_LINK') . "api/mandiriib/token";
        $url_mutasi_mib = env('API_LINK') . "api/mandiriib/mutasi";
        $url_token_bca = env('API_LINK') . "api/bca/token";
        $url_mutasi_bca = env('API_LINK') . "api/bca/mutasi";
        $url_token_bri = env('API_LINK') . "api/bri/token";
        $url_mutasi_bri = env('API_LINK') . "api/bri/mutasi";
        $url_token_bni = env('API_LINK') . "api/bni/token";
        $url_mutasi_bni = env('API_LINK') . "api/bni/mutasi";

        $bank = ListBank::all()->where('uid', Auth::user()->email)->where('id', $request->id)->first();

        $status_save = $bank->status;

            if ($status_save == "expired") {
            } else if ($status_save == "stop") {
            } else {
                $status_save = "perbarui";
            }
            $bank->status = $status_save;
            $bank->username_ibank = encrypt($this->delete_space($request->username));
            $bank->password_ibank = encrypt($this->delete_space($request->password));
            $bank->save();

            if ($bank->service == "MANDIRI") {
                $company_id = company_mib::all()->where('uid', Auth::user()->email)->where('referal_rekening', $bank->id)->first();
                $company_id->company_id = $request->company;
                $company_id->save();
            }

            $time = Carbon::now();
            $time->setTimezone('Asia/jakarta');
            $time->format('YYYY-MM-DD hh:mm:ss');

            $log = new log_activity;
            $log->uid = Auth::user()->email;
            $log->activity = $bank->service;
            $log->kategori = "log";
            $log->status = "invisible";
            $log->date = $time->toDateTimeString();
            $log->deskripsi = 'Rekening ' . $bank->service . ' Diperbarui';
            $log->save();

            return "berhasil";
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = ListBank::all()
            ->where('id', $request->id)
            ->first();

        $delete_transaksi = transaksi::all()
            ->where('uid', Auth::user()->email)
            ->where('no_rekening', $delete->no_rekening)
            ->where('referal_bank', $delete->id);
        foreach ($delete_transaksi as $key) {
            $key->delete();
        }

        if ($delete->service == "MANDIRI") {
            $company_delete = company_mib::all()
                ->where('referal_rekening', $delete->id)
                ->first();
            $company_delete->delete();
        }

        $delete->delete();

        $data = ListBank::all()->where('uid', Auth::user()->email);
        return count($data);
    }

    public function notif_add_bank($message, $new_bank, $riwayat_pembelian)
    {
        $change1 = str_replace("(service)", $new_bank->service, $message);
        $change2 = str_replace("(no_rekening)", $new_bank->no_rekening, $change1);
        $change3 = str_replace("(nama_paket)", $new_bank->nama_paket, $change2);
        $change4 = str_replace("(harga)", $this->rupiah($new_bank->harga), $change3);
        $change5 = str_replace("(durasi)", $riwayat_pembelian->durasi, $change4);
        $change6 = str_replace("(date)", date("d-m-Y (H:i)", strtotime($riwayat_pembelian->tgl_pembelian)), $change5);
        $change7 = str_replace("(expired)", date("d-m-Y (H:i)", strtotime($new_bank->date_expired)), $change6);

        return $change7;
    }

    public function rupiah($rupiah)
    {
        $hasil_rupiah = number_format($rupiah, 0, ',', '.');
        return $hasil_rupiah;
    }

    public function tambah_rekening()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {
            return view('user.add_rekening');
        } else {
            return redirect()->route('home');
        }
    }

    public function update_rekening(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {
            $data = ListBank::all()
                ->where('uid', Auth::user()->email)
                ->where('id', $request->id)
                ->first();

            if ($data->status == "expired") {
                return "Rekening Expired";
            }

            try {
                $data->username_ibank = decrypt($data->username_ibank);
            } catch (\Throwable $th) {
                $data->username_ibank = "Perbarui";
            }

            try {
                $data->password_ibank = decrypt($data->password_ibank);
            } catch (\Throwable $th) {
                $data->password_ibank = "Perbarui";
            }

            $data->comp_id = "0";

            $time = Carbon::now();
            $time->setTimezone('Asia/jakarta');
            $time->format('YYYY-MM-DD hh:mm:ss');

            $expired = strtotime($data->date_expired);
            $buy = strtotime($data->date);
            $different_on_minutes = ($expired - $buy) / 60;
            $different_on_day = $different_on_minutes / 1440;


            if ($data->service == "MANDIRI") {
                $comp_id = company_mib::all()
                    ->where('uid', $data->uid)
                    ->where('referal_rekening', $data->id)
                    ->first();

                $data->comp_id = $comp_id->company_id;
            }

            return view('user.update_rekening', compact('data', 'different_on_day'));
        } else {
            return redirect()->route('home');
        }
    }

    public function get_package()
    {
        $paket = list_packet::all()->where('status', 'aktif');
        $data_paket = [];
        $data_bank = [];
        $cek_paket = 0;
        foreach ($paket as $key) {
            $bank = referal_bank_packet::all()->where('referal_id', $key->id);
            $array_bank = [];
            $cek_ref = 0;
            foreach ($bank as $ref_bank) {
                $new_ref = new referal_bank_packet;
                $new_ref->no = $cek_paket;
                $new_ref->id = $ref_bank->id;
                $new_ref->referal_id = $ref_bank->referal_id;
                $new_ref->service = $ref_bank->service;
                $array_bank[$cek_ref] = $new_ref;
                $cek_ref++;
            }

            $new = new list_packet;
            $new->no = $cek_paket;
            $new->id = $key->id;
            $new->nama_paket = $key->nama_paket;
            $new->harga = $key->harga;
            $new->durasi = $key->durasi;
            $new->status = $key->status;
            $new->jenis = $key->jenis;
            $data_paket[$cek_paket] = $new;
            $data_bank[$cek_paket] = $array_bank;
            $cek_paket++;
        }

        return array(
            'data_paket' => $data_paket,
            'data_bank' => $data_bank,
            'total' => $cek_paket,
        );
    }

    public function delete_space($value)
    {
        $data = str_replace(' ', '', $value);
        return $data;
    }

    public function get_list_bank()
    {
        $rekening = ListBank::all()->where('uid', Auth::User()->email);
        $array_data = [];
        $cek = 1;
        $array_data[0] = count($rekening);
        foreach ($rekening as $data) {
            $data2 = new ListBank;
            $data2->id = $data->id;
            $data2->uid = $data->uid;
            $data2->service = $data->service;
            $data2->status = $data->status;
            $data2->jenis = $data->jenis;
            $data2->no_rekening = $data->no_rekening;
            $array_data[$cek] = $data2;
            $cek++;
        }
        return Response()->json($array_data);
    }

    public function graph_input_output()
    {
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD');
        $date = $time->toDateString();

        $arr_input = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $arr_output = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $arr_label = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];

        for ($c = 0; $c < 15; $c++) {
            $date_range = '-' . $c .  ' day';
            $arr_label[$c] = date('d-M-Y', strtotime($date_range, strtotime($date)));
        }

        $data1 = [];
        $list_bank = ListBank::all()->where('uid', Auth::user()->email);
        $transaksi = transaksi::all()->where('uid', Auth::user()->email);

        $count_input = 0;
        $count_output = 0;


        $sort = 0;

        foreach ($transaksi as $tsi) {
            $baru = new transaksi;
            $baru->no_rekening = $tsi->no_rekening;
            $baru->service = $tsi->service;
            $baru->deskripsi = $tsi->deskripsi;
            $baru->tipe = $tsi->tipe;
            $baru->tgl_transaksi = $tsi->tgl_transaksi;
            $baru->nominal = $tsi->nominal;

            $data1[$sort] = $baru;
            $sort++;
        }

        for ($b = 0; $b < count($data1); $b++) {
            if ($data1[$b]->tgl_transaksi == $date) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[0]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[0]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-1 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[1]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[1]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-2 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[2]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[2]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-3 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[3]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[3]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-4 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[4]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[4]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-5 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[5]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[5]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-6 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[6]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[6]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-7 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[7]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[7]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-8 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[8]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[8]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-9 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[9]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[9]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-10 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[10]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[10]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-11 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[11]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[11]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-12 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[12]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[12]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-13 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[13]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[13]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-14 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[14]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[14]++;
                    $count_output++;
                }
            }
        }

        $output = [];
        $output[0] = $arr_label;
        $output[1] = $count_input;
        $output[2] = $count_output;
        $output[3] = $arr_input;
        $output[4] = $arr_output;

        return $output;
    }

    public function graph_bank()
    {
        $bank = ListBank::all()->where('uid', Auth::user()->email);
        $output_array = [];
        $output_array[0] = count($bank);
        $output_array[1] = count($bank->where('service', 'BCA'));
        $output_array[2] = count($bank->where('service', 'BRI'));
        $output_array[3] = count($bank->where('service', 'BNI'));
        $output_array[4] = count($bank->where('service', 'MANDIRI'));

        // Persentase Bank
        $output_array[5] = number_format(($output_array[1] / $output_array[0]) * 100, 1);
        $output_array[6] = number_format(($output_array[2] / $output_array[0]) * 100, 1);
        $output_array[7] = number_format(($output_array[3] / $output_array[0]) * 100, 1);
        $output_array[8] = number_format(($output_array[4] / $output_array[0]) * 100, 1);
        if (count($bank) == 0) {
            return "zero";
        } else {
            return $output_array;
        }
    }

    public function graph_refresh(Request $request)
    {
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD');
        $date = $time->toDateString();

        $arr_input = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $arr_output = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $arr_label = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];

        for ($c = 0; $c < 15; $c++) {
            $date_range = '-' . $c .  ' day';
            $arr_label[$c] = date('d-M-Y', strtotime($date_range, strtotime($date)));
        }

        $data1 = [];
        $transaksi = transaksi::all()->where('uid', Auth::user()->email)->where('no_rekening', $request->no_rekening)->where('referal_bank', $request->id_bank);

        $count_input = 0;
        $count_output = 0;


        $sort = 0;

        foreach ($transaksi as $tsi) {
            $baru = new transaksi;
            $baru->no_rekening = $tsi->no_rekening;
            $baru->service = $tsi->service;
            $baru->deskripsi = $tsi->deskripsi;
            $baru->tipe = $tsi->tipe;
            $baru->tgl_transaksi = $tsi->tgl_transaksi;
            $baru->nominal = $tsi->nominal;

            $data1[$sort] = $baru;
            $sort++;
        }

        // Input data to array by date
        for ($b = 0; $b < count($data1); $b++) {
            if ($data1[$b]->tgl_transaksi == $date) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[0]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[0]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-1 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[1]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[1]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-2 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[2]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[2]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-3 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[3]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[3]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-4 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[4]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[4]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-5 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[5]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[5]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-6 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[6]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[6]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-7 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[7]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[7]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-8 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[8]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[8]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-9 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[9]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[9]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-10 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[10]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[10]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-11 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[11]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[11]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-12 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[12]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[12]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-13 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[13]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[13]++;
                    $count_output++;
                }
            }

            if ($data1[$b]->tgl_transaksi == date('Y-m-d', strtotime('-14 day', strtotime($date)))) {
                if ($data1[$b]->tipe == "DEBIT") {
                    $arr_input[14]++;
                    $count_input++;
                } else if ($data1[$b]->tipe == "KREDIT") {
                    $arr_output[14]++;
                    $count_output++;
                }
            }
        }

        $output = [];
        $output[0] = $arr_label;
        $output[1] = $count_input;
        $output[2] = $count_output;
        $output[3] = $arr_input;
        $output[4] = $arr_output;

        return $output;
    }

    public function take_data_bank($url_token, $username, $password, $rekening, $url_mutasi)
    {
        
        $data_mutasi = null;

        return $data_mutasi;
    }

    public function take_data_bank_mib($url_token, $compID, $username, $password, $rekening, $url_mutasi)
    {
        $data_mutasi = null;
        return $data_mutasi;
    }

    public function notif($username, $target, $message, $api_key)
    {
        $data = null;
        return $data;
    }

    public function perpanjang_paket(Request $request)
    {
        $bank = ListBank::all()
            ->where('uid', Auth::user()->email)
            ->where('id', $request->id)
            ->first();

        if ($bank->status == "stop" || $bank->status == "expired") {
        } else {
            return "null_bank";
        }

        return "berhasil";
    }

    public function update_masa_aktif(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {

            $bank = ListBank::all()
                ->where('uid', Auth::user()->email)
                ->where('id', $request->id)
                ->first();

            if ($bank->status == "stop" || $bank->status == "expired") {
            } else {
                return "Rekening Tidak Ditemukan";
            }

            $company_id = "";

            if ($bank->service == "MANDIRI") {
                $company = company_mib::all()
                    ->where('referal_rekening', $bank->id)
                    ->first();

                $company_id = $company->company_id;
            }

            $bank->username_ibank = decrypt($bank->username_ibank);
            $bank->password_ibank = decrypt($bank->password_ibank);

            return view('user.perpanjang_paket', compact('bank', 'company_id'));
        } else {
            return redirect()->route('home');
        }
    }

    public function save_update_durasi(Request $request)
    {
        $harga = ltrim($request->harga, "Rp ");

        $data_paket = list_packet::all()
            ->where('id', $request->paket)
            ->where('harga', $harga)
            ->where('status', "aktif")
            ->first();

        if ($data_paket == NULL) {
            return "null_packet";
        }

        $durasi = 1;
        $id_paket = "-";

        if ($data_paket->jenis == "harian") {
            $id_paket = $data_paket->id;
        } else {
            $durasi = $data_paket->durasi;
        }

        if (Auth::user()->saldo < $harga) {
            return "null_saldo";
        }

        $ref_bank = referal_bank_packet::all()->where('referal_id', $data_paket->id);

        // Validate service
        $validate_service = 0;
        foreach ($ref_bank as $key) {
            if ($key->service == $request->service) {
                $validate_service = 1;
            }
        }

        if ($validate_service == 0) {
            return "null_service";
        }

        $data_bank_user = ListBank::all()
            ->where('uid', Auth::user()->email)
            ->where('id', $request->id)
            ->first();

        if (
            $data_bank_user->status == "stop" ||
            $data_bank_user->status == "expired"
        ) {
        } else {
            return "null_expired";
        }

        $url_token_mib = env('API_LINK') . "api/mandiriib/token";
        $url_mutasi_mib = env('API_LINK') . "api/mandiriib/mutasi";
        $url_token_bca = env('API_LINK') . "api/bca/token";
        $url_mutasi_bca = env('API_LINK') . "api/bca/mutasi";
        $url_token_bri = env('API_LINK') . "api/bri/token";
        $url_mutasi_bri = env('API_LINK') . "api/bri/mutasi";
        $url_token_bni = env('API_LINK') . "api/bni/token";
        $url_mutasi_bni = env('API_LINK') . "api/bni/mutasi";

        if ($request->service == "BCA") {
            $data = $this->take_data_bank(
                $url_token_bca,
                $request->username,
                $request->password,
                $data_bank_user->no_rekening,
                $url_mutasi_bca
            );
        } else if ($request->service == "BRI") {
            $data = $this->take_data_bank(
                $url_token_bri,
                $request->username,
                $request->password,
                $data_bank_user->no_rekening,
                $url_mutasi_bri
            );
        } else if ($request->service == "BNI") {
            $data = $this->take_data_bank(
                $url_token_bni,
                $request->username,
                $request->password,
                $data_bank_user->no_rekening,
                $url_mutasi_bni
            );
        } else if ($request->service == "MANDIRI") {
            $data = $this->take_data_bank_mib(
                $url_token_mib,
                $request->company,
                $request->username,
                $request->password,
                $data_bank_user->no_rekening,
                $url_mutasi_mib
            );
        }

        $data_status = $data->status;

        if ($data_status == "ERROR") {
            if ($data->error_code == 704) {
                return "gagal_login";
            } else if ($data->error_code == 705) {
                return "sesi_login";
            } else if ($data->error_code == 706) {
                return "error_captcha";
            } else if ($data->error_code == 707) {
                return "invalid_rekening";
            }
        } else {
            date_default_timezone_set("Asia/Jakarta");
            $time = Carbon::now();
            $time->setTimezone('Asia/jakarta');
            $time->format('YYYY-MM-DD hh:mm:ss');

            $time_now = Carbon::now();
            $time_now->setTimezone('Asia/jakarta');
            $time_now->format('YYYY-MM-DD hh:mm:ss');

            // ---------------
            // BEGIN Data Bank
            // ---------------


            // $data_bank_user = ListBank::all()
            //     ->where('uid', Auth::user()->email)
            //     ->where('id', $request->id)
            //     ->first();

            if ($data_bank_user->service != "MANDIRI" && $request->service == "MANDIRI") {
                $company_new = new company_mib;
                $company_new->uid = Auth::user()->email;
                $company_new->referal_rekening = $data_bank_user->id;
                $company_new->company_id = $request->company;
                $company_new->save();
            }

            if ($data_bank_user->service == "MANDIRI" && $request->service == "MANDIRI") {
                $company_save = company_mib::all()
                    ->where('referal_rekening', $data_bank_user->id)
                    ->first();
                $company_save->uid = Auth::user()->email;
                $company_save->referal_rekening = $data_bank_user->id;
                $company_save->company_id = $request->company;
                $company_save->save();
            }

            $data_bank_user->service = $request->service;
            $data_bank_user->username_ibank = encrypt($request->username);
            $data_bank_user->password_ibank = encrypt($this->delete_space($request->password));
            $data_bank_user->status = "perbarui";
            $data_bank_user->harga = $harga;
            $data_bank_user->jenis = $data_paket->jenis;
            $data_bank_user->referal_paket_id = $id_paket;
            $data_bank_user->nama_paket = $data_paket->nama_paket;
            $data_bank_user->date = $time_now;
            $data_bank_user->date_expired = $time->addDay($durasi);
            $data_bank_user->save();

            $saldo = User::all()->where('email', Auth::user()->email)->first();
            $saldo->saldo = $saldo->saldo - $harga;
            $saldo->save();

            // ----------------
            // END Data Bank
            // ----------------

            // -----------------
            // BEGIN Buy History
            // -----------------

            $time_history = Carbon::now();
            $time_history->setTimezone('Asia/jakarta');
            $time_history->format('YYYY-MM-DD hh:mm:ss');

            $riwayat_pembelian = new riwayat_pembelian;
            $riwayat_pembelian->uid = Auth::user()->email;
            $riwayat_pembelian->nama_paket = $data_paket->nama_paket;
            $riwayat_pembelian->service = $request->service;
            $riwayat_pembelian->no_rekening = $data_bank_user->no_rekening;
            $riwayat_pembelian->harga = $data_paket->harga;
            $riwayat_pembelian->jenis = $data_paket->jenis;
            $riwayat_pembelian->durasi = $data_paket->durasi;
            $riwayat_pembelian->tgl_pembelian = $time_history;
            $riwayat_pembelian->status = "berhasil";
            $riwayat_pembelian->save();

            // -----------------
            // END Buy History
            // -----------------

            $user = User::all()->where('email', Auth::user()->email)->first();
            $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();
            $message_bank = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'add_bank')->first();

            if (
                $admin->status == "aktif" &&
                $message_bank->status == "aktif" &&
                $user->notif_wa == "aktif"
            ) {
                $change_message = $this->notif_add_bank($message_bank->message, $data_bank_user, $riwayat_pembelian);
                $this->notif($admin->username, $user->no_hp, $change_message, $admin->api_key);
            }

            return "berhasil";
        }
    }

    public function stop_packet(Request $request)
    {
        $bank = ListBank::all()
            ->where('id', $request->id)
            ->where('uid', Auth::user()->email)
            ->first();

        if ($bank == NULL) {
            return "null_bank";
        }

        $bank->status = "stop";
        $bank->save();

        return "berhasil";
    }
}
