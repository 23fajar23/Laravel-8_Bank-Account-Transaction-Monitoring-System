<?php

namespace App\Http\Controllers;

use App\Models\autonotif;
use App\Models\bank_deposit;
use App\Models\deposit;
use App\Models\mutasi_bank_deposit;
use App\Models\riwayat_pembelian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            $deposit = deposit::all();

            $bca = 0;
            $bri = 0;
            $bni = 0;
            $mandiri = 0;

            $bca_persen = 0;
            $bri_persen = 0;
            $bni_persen = 0;
            $mandiri_persen = 0;

            foreach ($deposit as $key) {
                if ($key->service == "BCA") {
                    $bca++;
                } else if ($key->service == "BRI") {
                    $bri++;
                } else if ($key->service == "BNI") {
                    $bni++;
                } else if ($key->service == "MANDIRI") {
                    $mandiri++;
                }
            }

            if ($bca == 0) {
                $bca_persen = 0;
            } else {
                $bca_persen = ($bca * 100) / count($deposit);
            }

            if ($bri == 0) {
                $bri_persen = 0;
            } else {
                $bri_persen = ($bri * 100) / count($deposit);
            }

            if ($bni == 0) {
                $bni_persen = 0;
            } else {
                $bni_persen = ($bni * 100) / count($deposit);
            }

            if ($mandiri == 0) {
                $mandiri_persen = 0;
            } else {
                $mandiri_persen = ($mandiri * 100) / count($deposit);
            }

            $output = array(
                'bca' => $bca,
                'bri' => $bri,
                'bni' => $bni,
                'mandiri' => $mandiri,
                'bca_persen' => $bca_persen,
                'bri_persen' => $bri_persen,
                'bni_persen' => $bni_persen,
                'mandiri_persen' => $mandiri_persen,
            );
            return view('admin.bank_received', compact('output'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user') {
            $invoice = riwayat_pembelian::all()
                ->where('uid', Auth::user()->email)
                ->where('id', $request->transaksi_id)
                ->first();

            // $date_tes = strtotime($invoice->tgl_pembelian);
            $expired = date('d-M-Y (H:i)', strtotime($invoice->tgl_pembelian . "+" . $invoice->durasi . " days"));
            $invoice->coba = date($invoice->tgl_pembelian);
            $invoice->tgl_pembelian = date('d-M-Y (H:i)', strtotime($invoice->tgl_pembelian));

            $user = User::all()->where('email', $invoice->uid)->first();
            $invoice->name = $user->fullname;
            $invoice->harga = "Rp " . $this->rupiah($invoice->harga);

            return view('user.invoice_transaksi', compact('invoice', 'expired'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user') {
            $invoice = deposit::all()
                ->where('uid', Auth::user()->email)
                ->where('id', $request->deposit_id)
                ->first();
            $invoice->date = date('d-M-Y (H:i)', strtotime($invoice->date));
            $invoice->expired = date('d-M-Y (H:i)', strtotime($invoice->expired));


            $user = User::all()->where('email', $invoice->uid)->first();
            $invoice->name = $user->fullname;
            $invoice->nominal = "Rp " . $this->rupiah($invoice->nominal);
            $invoice->tagihan = "Rp " . $this->rupiah($invoice->tagihan);

            return view('user.invoice_deposit', compact('invoice'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function riwayat_transaksi()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user') {
            return view("user.riwayat_transaksi");
        } else {
            return redirect()->route('home');
        }
    }

    public function page_mutasi_saldo()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user') {

            // $data = deposit::all()->where('uid', Auth::user()->email);

            $output = [];
            $output[0] = 0;
            $output[1] = 0;
            $output[2] = 0;
            $output[3] = 0;
            $output[4] = 0;
            $output[5] = 0;

            $berhasil = deposit::all()
                ->where('uid', Auth::user()->email)
                ->where('status', 'berhasil');

            $wait = deposit::all()
                ->where('uid', Auth::user()->email)
                ->where('status', 'wait');

            $expired = deposit::all()
                ->where('uid', Auth::user()->email)
                ->where('status', 'expired');

            $output[0] = count($berhasil);
            $output[1] = count($wait);
            $output[2] = count($expired);
            $total = $output[0] + $output[1] + $output[2];


            if ($output[0] != 0) {
                $output[3] = ($output[0] * 100) / $total;
            }

            if ($output[1] != 0) {
                $output[4] = ($output[1] * 100) / $total;
            }

            if ($output[2] != 0) {
                $output[5] = ($output[2] * 100) / $total;
            }

            return view("user.mutasi_saldo", compact('output'));
        } else {
            return redirect()->route('home');
        }
    }

    public function rupiah($rupiah)
    {
        $hasil_rupiah = number_format($rupiah, 0, ',', '.');
        return $hasil_rupiah;
    }

    public function ajax_mutasi_saldo()
    {
        $array = [];
        $cek = 0;
        $data = deposit::orderBy('id', 'DESC')->where('uid', Auth::User()->email)->get();
        foreach ($data as $key) {
            $output = new deposit;
            $output->no = $cek + 1;
            $output->id = $key->id;
            $output->nominal = "Rp " . $this->rupiah($key->nominal);
            $output->kode_unik = $key->kode_unik;
            $output->tagihan = "Rp " . $this->rupiah($key->tagihan);
            $output->service = $key->service;
            $output->status = $key->status;
            $output->date = date('d M Y ( H:i )', strtotime($key->date));
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addColumn('status', 'user.action.saldo_btn_status')
                ->addColumn('action', 'user.action.saldo-action')
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function ajax_mutasi_transaksi()
    {
        $array = [];
        $cek = 0;
        $data = riwayat_pembelian::orderBy('id', 'DESC')->where('uid', Auth::User()->email)->get();
        foreach ($data as $key) {
            $output = new riwayat_pembelian;
            $output->no = $cek + 1;
            $output->id = $key->id;
            $output->nama_paket = $key->nama_paket;
            $output->service = $key->service;
            $output->jenis = ucfirst($key->jenis);
            $output->harga = "Rp " . $this->rupiah($key->harga);
            // $output->service = $key->service;
            $output->durasi = $key->durasi . " Hari";
            $output->tgl_pembelian = date('d M Y (H:i)', strtotime($key->tgl_pembelian));
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                // ->addColumn('status', 'user.action.saldo_btn_status')
                ->addColumn('action', 'user.action.transaksi-action')
                ->rawColumns(['action'])
                // ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function request_deposit(Request $request)
    {

        if ($request->saldo < 10000) {
            return array(
                'status' => "min_saldo"
            );
        }


        $data_bank = bank_deposit::all()->where('service', $request->service)->where('status', 'aktif')->first();

        if ($data_bank == NULL) {
            return array(
                'status' => "null_service"
            );
        }

        $random_code = rand(100, 999);
        $all_deposit = deposit::all()->where('uid', Auth::user()->email);
        $validate = 0;

        foreach ($all_deposit as $key) {
            if ($key->status == "expired" || $key->status == "berhasil") {
            } else {
                if ($random_code ==  $key->kode_unik) {
                    $validate = 1;
                }
            }
        }

        if ($validate == 1) {
            return array(
                'status' => "try_again"
            );
        }

        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $save = new deposit;
        $save->uid = Auth::user()->email;
        $save->nominal = $request->saldo;
        $save->kode_unik = $random_code;
        $save->tagihan = intval($request->saldo) + $random_code;
        $save->nama_rekening = $data_bank->nama_rekening;
        $save->no_rekening = $data_bank->no_rekening;
        $save->service = $data_bank->service;
        $save->date = $time->now();
        $save->expired = $time->addDays(1);
        $save->status = "wait";
        $save->save();

        $user = User::all()->where('email', Auth::user()->email)->first();
        $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();
        $message_top_up = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'top_up')->first();

        if (
            $admin->status == "aktif" &&
            $message_top_up->status == "aktif" &&
            $user->notif_wa == "aktif"
        ) {
            $change_message = $this->notif_top_up($message_top_up->message, $save);
            $this->notif($admin->username, $user->no_hp, $change_message, $admin->api_key);
        }

        return array(
            'status' => "berhasil",
            'id' => $save->id
        );
    }

    public function notif_top_up($message, $data)
    {
        $change1 = str_replace("(nominal)", $this->rupiah($data->nominal), $message);
        $change2 = str_replace("(tagihan)", $this->rupiah($data->tagihan), $change1);
        $change3 = str_replace("(no_rekening)", $data->no_rekening, $change2);
        $change4 = str_replace("(nama_rekening)", $data->nama_rekening, $change3);
        $change5 = str_replace("(service)", $data->service, $change4);
        $change6 = str_replace("(expired)", date("d-m-Y (H:i)", strtotime($data->expired)), $change5);
        $change7 = str_replace("(kode_unik)", $data->kode_unik, $change6);

        return $change7;
    }

    public function get_bank_received()
    {
        $data = bank_deposit::all()->where('status', 'aktif');
        $output = [];

        $cek = 0;
        foreach ($data as $key) {
            $output[$cek] = $key->service;
            $cek++;
        }

        return $output;
    }

    public function try_change($data)
    {

        try {
            return decrypt($data);
        } catch (\Throwable $th) {
            return $data;
        }
    }

    public function data_bank_admin()
    {
        $bca = bank_deposit::all()->where('service', 'BCA')->first();
        $bri = bank_deposit::all()->where('service', 'BRI')->first();
        $bni = bank_deposit::all()->where('service', 'BNI')->first();
        $mandiri = bank_deposit::all()->where('service', 'MANDIRI')->first();

        $data = ['bca', 'bri', 'bni', 'mandiri'];

        $bca->username_ibank = $this->try_change($bca->username_ibank);
        $bca->password_ibank = $this->try_change($bca->password_ibank);
        $bri->username_ibank = $this->try_change($bri->username_ibank);
        $bri->password_ibank = $this->try_change($bri->password_ibank);

        $bni->username_ibank = $this->try_change($bni->username_ibank);
        $bni->password_ibank = $this->try_change($bni->password_ibank);
        $mandiri->username_ibank = $this->try_change($mandiri->username_ibank);
        $mandiri->password_ibank = $this->try_change($mandiri->password_ibank);

        return array(
            'bca' => $bca,
            'bri' => $bri,
            'bni' => $bni,
            'mandiri' => $mandiri
        );
    }

    public function save_deposit_bank(Request $request)
    {
        $cek = 0;
        if (
            $request->service == "BCA" ||
            $request->service == "BRI" ||
            $request->service == "BNI" ||
            $request->service == "MANDIRI"
        ) {
            $cek = 1;
        }

        if ($cek == 1) {
            $save_bank = bank_deposit::all()->where('service', $request->service)->first();
            if ($save_bank->status == "aktif" && $request->status == "tidak_aktif") {
                $save_bank->nama_rekening = $request->nama_rekening;
                $save_bank->status = "tidak_aktif";
                $save_bank->save();
                return "status_off";
            } else if ($save_bank->status == "tidak_aktif" && $request->status == "aktif") {
                $username = $this->try_change($save_bank->username_ibank);
                $password = $this->try_change($save_bank->password_ibank);

                if ($request->service == "MANDIRI") {
                    if (
                        $save_bank->no_rekening == $request->no_rekening &&
                        $save_bank->company_id == $request->company_id &&
                        $username == $request->username &&
                        $password == $request->password &&
                        $save_bank->mutasi == "berhasil"
                    ) {
                        $save_bank->nama_rekening = $request->nama_rekening;
                        $save_bank->status = "aktif";
                        $save_bank->save();
                        return "status_on";
                    }
                } else {
                    if (
                        $save_bank->no_rekening == $request->no_rekening &&
                        $username == $request->username &&
                        $password == $request->password &&
                        $save_bank->mutasi == "berhasil"
                    ) {
                        $save_bank->nama_rekening = $request->nama_rekening;
                        $save_bank->status = "aktif";
                        $save_bank->save();
                        return "status_on";
                    }
                }
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
                    $request->no_rekening,
                    $url_mutasi_bca
                );
            } else if ($request->service == "BRI") {
                $data = $this->take_data_bank(
                    $url_token_bri,
                    $request->username,
                    $request->password,
                    $request->no_rekening,
                    $url_mutasi_bri
                );
            } else if ($request->service == "BNI") {
                $data = $this->take_data_bank(
                    $url_token_bni,
                    $request->username,
                    $request->password,
                    $request->no_rekening,
                    $url_mutasi_bni
                );
            } else if ($request->service == "MANDIRI") {
                $data = $this->take_data_bank_mib(
                    $url_token_mib,
                    $request->company_id,
                    $request->username,
                    $request->password,
                    $request->no_rekening,
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
                $save_bank->nama_rekening = $request->nama_rekening;
                $save_bank->no_rekening = $request->no_rekening;
                $save_bank->status = $request->status;
                $save_bank->mutasi = "berhasil";
                $save_bank->username_ibank = encrypt($request->username);
                $save_bank->password_ibank = encrypt($request->password);

                if ($request->service == "MANDIRI") {
                    $save_bank->company_id = $request->company_id;
                }

                $save_bank->save();

                return "berhasil";
            }
        }
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

    public function ajax_deposit_datatables()
    {
        $array = [];
        $cek = 0;
        $data = mutasi_bank_deposit::all();
        foreach ($data as $key) {
            $output = new mutasi_bank_deposit;
            $output->no = $cek + 1;
            $output->id = $key->id;
            $output->service = $key->service;
            $output->deskripsi = $key->deskripsi;
            $output->tipe = $key->tipe;
            $output->no_rekening = $key->no_rekening;
            $output->nominal = "Rp " . $this->rupiah($key->nominal);
            $output->tgl_transaksi = date("d-m-Y", strtotime($key->tgl_transaksi));
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function page_data_deposit()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {

            return view('admin.data_deposit');
        } else {
            return redirect()->route('home');
        }
    }

    public function ajax_riwayat_deposit_datatables()
    {
        $array = [];
        $cek = 0;
        $data = deposit::all();
        foreach ($data as $key) {
            // $user = User::all()->where('email', $key->uid)->first();
            $output = new deposit;
            $output->no = $cek + 1;
            $output->id = $key->id;
            $output->uid = $key->uid;
            $output->nominal = "Rp " . $this->rupiah($key->nominal);
            $output->kode_unik = $key->kode_unik;
            $output->tagihan = "Rp " . $this->rupiah($key->tagihan);
            $output->no_rekening = $key->no_rekening;
            $output->nama_rekening = $key->nama_rekening;
            $output->service = $key->service;
            $output->date = date("d M Y (h:i)", strtotime($key->date));
            $output->expired = date("d M Y (h:i)", strtotime($key->expired));
            $output->status = $key->status;
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addColumn('status', 'admin.action.deposit-status')
                ->addColumn('action', 'admin.action.deposit-action')
                ->rawColumns(['action'])
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function search_deposit(Request $request)
    {
        $data = deposit::all()
            ->where('id', $request->id)
            ->first();

        if ($data->status == "berhasil") {
            return "null";
        } else {
            $data->status = "berhasil";
            $data->save();

            $user = User::all()->where('email', $data->uid)->first();
            $user->saldo = $user->saldo + $data->nominal;
            $user->save();
        }
    }

    public function page_data_pembelian()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {

            $riwayat_buy = riwayat_pembelian::all();

            $bca = 0;
            $bri = 0;
            $bni = 0;
            $mandiri = 0;

            $bca_persen = 0;
            $bri_persen = 0;
            $bni_persen = 0;
            $mandiri_persen = 0;

            foreach ($riwayat_buy as $key) {
                if ($key->service == "BCA") {
                    $bca++;
                } else if ($key->service == "BRI") {
                    $bri++;
                } else if ($key->service == "BNI") {
                    $bni++;
                } else if ($key->service == "MANDIRI") {
                    $mandiri++;
                }
            }

            if ($bca == 0) {
                $bca_persen = 0;
            } else {
                $bca_persen = ($bca * 100) / count($riwayat_buy);
            }

            if ($bri == 0) {
                $bri_persen = 0;
            } else {
                $bri_persen = ($bri * 100) / count($riwayat_buy);
            }

            if ($bni == 0) {
                $bni_persen = 0;
            } else {
                $bni_persen = ($bni * 100) / count($riwayat_buy);
            }

            if ($mandiri == 0) {
                $mandiri_persen = 0;
            } else {
                $mandiri_persen = ($mandiri * 100) / count($riwayat_buy);
            }

            $output = array(
                'bca' => $bca,
                'bri' => $bri,
                'bni' => $bni,
                'mandiri' => $mandiri,
                'bca_persen' => $bca_persen,
                'bri_persen' => $bri_persen,
                'bni_persen' => $bni_persen,
                'mandiri_persen' => $mandiri_persen,
            );

            return view('admin.data_pembelian', compact('output'));
        } else {
            return redirect()->route('home');
        }
    }

    public function ajax_riwayat_pembelian_datatables()
    {
        $array = [];
        $cek = 0;
        $data = riwayat_pembelian::orderBy('id', 'DESC')->get();
        foreach ($data as $key) {
            $output = new riwayat_pembelian;
            $output->no = $cek + 1;
            $output->id = $key->id;
            $output->uid = $key->uid;
            $output->nama_paket = $key->nama_paket;
            $output->service = $key->service;
            $output->jenis = ucfirst($key->jenis);
            $output->no_rekening = $key->no_rekening;
            $output->harga = "Rp " . $this->rupiah($key->harga);
            $output->durasi = $key->durasi . " Hari";
            $output->tgl_pembelian = date("d M Y (h:i)", strtotime($key->tgl_pembelian));
            $output->status = $key->status;
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
