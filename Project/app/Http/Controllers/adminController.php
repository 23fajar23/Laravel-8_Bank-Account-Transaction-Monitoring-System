<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\autonotif;
use App\Models\company_mib;
use App\Models\deposit;
use App\Models\integrasi;
use App\Models\laporan_autonotif;
use App\Models\riwayat_pembelian;
use App\Models\list_packet;
use App\Models\ListBank;
use App\Models\log_activity;
use App\Models\otp;
use App\Models\phone_autonotif;
use App\Models\referal_bank_packet;
use App\Models\testimoni;
use App\Models\track_message;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (strlen($request->name) < 5) {
            return "null_name";
        }

        if (strlen($request->fullname) < 8) {
            return "null_fullname";
        }

        if ($request->jenis_kelamin != "laki-laki" && $request->jenis_kelamin != "perempuan") {
            return "null_jk";
        }

        if (strlen($request->kota) == 0) {
            return "null_kota";
        }

        if (strlen($request->alamat) == 0) {
            return "null_alamat";
        }

        if (strlen($request->no_hp) == 0) {
            return "null_no_hp";
        }

        if (!is_numeric($request->no_hp)) {
            return "numeric_no_hp";
        }

        if (strlen($request->password) < 8) {
            return "null_password";
        }

        $user = User::all()
            ->where('email', $request->email)
            ->first();

        if ($user != NULL) {
            return "null_email";
        }

        // Begin Send OTP
        $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();

        // Begin Delete data before create new data if any have error in mysql
        $cek_autonotif = autonotif::all()->where('uid', $request->email);
        $cek_phone = phone_autonotif::all()->where('uid', $request->email);
        $cek_laporan_autonotif = laporan_autonotif::all()->where('uid', $request->email);
        $cek_otp = otp::all()->where('uid', $request->email);

        $this->delete_data($cek_autonotif);
        $this->delete_data($cek_phone);
        $this->delete_data($cek_laporan_autonotif);
        $this->delete_data($cek_otp);
        // End Delete data before create new data if any have error in mysql

        $api_key = md5($request->email);
        $api_signature = md5($request->password . $request->email);

        DB::table('integrasis')->insert(
            [
                'email'              => $request->email,
                'status'             => "tidak_aktif",
                'api_key'            => Hash::make($api_key),
                'api_signature'      => Hash::make($api_signature),
                'url'                => NULL
            ]
        );

        $autonotif = new autonotif;
        $autonotif->uid = $request->email;
        $autonotif->username = NULL;
        $autonotif->api_key = NULL;
        $autonotif->kategori = "user";
        $autonotif->otoritas = "user";
        $autonotif->message = "Telah terjadi transaksi sebesar Rp(nominal) di rekening (no_rekening) dengan jenis tansaksi (jenis_transaksi) pada tanggal (tgl_transaksi)";
        $autonotif->status = "tidak_aktif";
        $autonotif->save();

        $phone = new phone_autonotif;
        $phone->uid = $request->email;
        $phone->referal_autonotif = $autonotif->id;
        $phone->jenis = "semua";
        $phone->phone = $this->change_no_hp($request->no_hp);
        $phone->save();

        $self = new laporan_autonotif;
        $self->uid = $request->email;
        $self->status = "tidak_aktif";
        $self->message = "Notifikasi transaksi sebesar Rp(nominal) pada rekening (no_rekening) berhasil dikirim.";
        $self->save();

        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $self = new otp;
        $self->uid = $request->email;
        $self->kode = rand(100000, 999999);
        $self->status_resend = "available";
        $self->date_expired = $time->addMinutes(30);
        $self->save();

        $message_otp = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'otp')->first();
        $message_register = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'register')->first();
        $change_message = str_replace("(otp)", $self->kode, $message_otp->message);
        $change_register = $this->change_message_register($message_register->message, $request);

        if (
            $admin->status == "aktif"
        ) {
            if ($message_otp->status == "aktif") {
                $this->send_notif_wa($admin->username, $this->change_no_hp($request->no_hp), $change_message, $admin->api_key);
            }

            if ($message_register->status == "aktif") {
                $this->send_notif_wa($admin->username, $this->change_no_hp($request->no_hp), $change_register, $admin->api_key);
            }
        }

        // End Send OTP

        User::create([
            'name' => $request->name,
            'fullname' => $request->fullname,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'no_hp' => $this->change_no_hp($request->no_hp),
            'api_key' => $api_key,
            'api_signature' => $api_signature,
            'otoritas' => 'user',
            'notif_wa' => 'aktif',
            'status' => 'baru',
            'saldo' => '15000',
            'perusahaan' => $request->perusahaan,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

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
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            $user = User::all()->where('id', $request->user_id)->first();
            $user->saldo = $this->rupiah($user->saldo);
            $data_paket = ListBank::all()->where('uid', $user->email);
            $count_paket = count(ListBank::all()->where('uid', $user->email));

            return view('admin.page_update_add_rekening', compact('user', 'data_paket', 'count_paket'));
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

        if (Auth::user()->otoritas == 'admin') {
            $user = User::all()->where('id', $request->user_id)->first();
            $rekening = ListBank::orderBy('id', 'DESC')->where('uid', $user->email)->get();
            $testimoni = testimoni::orderBy('id', 'DESC')->where('uid', $user->email)->get();

            return view('admin.update_data_user', compact('user', 'rekening', 'testimoni'));
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
    public function edit(Request $request)
    {
        $password = User::all()->where('id', $request->id)->first();
        $password->password = Hash::make($request->password);
        $password->save();
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
        $update = User::all()->where('id', $request->id)->first();
        $update->name = $request->name;
        $update->fullname = $request->fullname;
        $update->jenis_kelamin = $request->jenis_kelamin;
        $update->kota = $request->kota;
        $update->alamat = $request->alamat;
        $update->no_hp = $this->change_no_hp($request->no_hp);
        $update->perusahaan = $request->perusahaan;
        $update->jabatan = $request->jabatan;
        $update->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = User::all()->where('id', $request->id)->first();
        $integrasi = integrasi::all()->where('email', $delete->email)->first();
        $autonotif = autonotif::all()->where('uid', $delete->email)->first();
        $otp = otp::all()->where('uid', $delete->email)->first();

        $deposit = deposit::all()->where('uid', $delete->email);
        foreach ($deposit as $key) {
            $key->delete();
        }

        $laporan_autonotif = laporan_autonotif::all()->where('uid', $delete->email);
        foreach ($laporan_autonotif as $key) {
            $key->delete();
        }

        $phone_autonotif = phone_autonotif::all()->where('uid', $delete->email);
        foreach ($phone_autonotif as $key) {
            $key->delete();
        }

        $bank = ListBank::all()->where('uid', $delete->email);
        foreach ($bank as $key) {
            $key->delete();
        }

        $company_mib = company_mib::all()->where('uid', $delete->email);
        foreach ($company_mib as $key) {
            $key->delete();
        }

        $transaksi = transaksi::all()->where('uid', $delete->email);
        foreach ($transaksi as $key) {
            $key->delete();
        }

        $log_activity = log_activity::all()->where('uid', $delete->email);
        foreach ($log_activity as $key) {
            $key->delete();
        }

        $track_message = track_message::all()->where('uid', $delete->email);
        foreach ($track_message as $key) {
            $key->delete();
        }

        $riwayat_pembelian = riwayat_pembelian::all()->where('uid', $delete->email);
        foreach ($riwayat_pembelian as $key) {
            $key->uid = "-";
            $key->no_rekening = "-";
            $key->save();
        }

        $otp->delete();
        $autonotif->delete();
        $integrasi->delete();
        $delete->delete();
    }

    public function rupiah($rupiah)
    {
        $hasil_rupiah = number_format($rupiah, 0, ',', '.');
        return $hasil_rupiah;
    }

    public function change_no_hp($value)
    {
        $data = substr($value, 0, 1);
        $data1 = substr($value, 0, 2);
        if ($data == "0") {
            $change = substr($value, 1);
            $output = 62 . $change;
            return $output;
        } else if ($data1 != "62") {
            $output = 62 . $value;
            return $output;
        } else {
            return $value;
        }
    }

    function delete_data($data)
    {
        foreach ($data as $key) {
            $key->delete();
        }
    }

    public function cek_rekening(Request $request)
    {
        $data = ListBank::all()->where('id', $request->id)->first();
        if ($data->harga == "-") {
        } else {
            $data->harga = $this->rupiah($data->harga);
        }

        $expired = strtotime($data->date_expired);
        $buy = strtotime($data->date);
        $different_on_minutes = ($expired - $buy) / 60;
        $different_on_day = $different_on_minutes / 1440;
        $data->durasi = $different_on_day;

        if ($data->service == "MANDIRI") {
            $company = company_mib::all()
                ->where('referal_rekening', $data->id)
                ->first();
            $data->company_id = $company->company_id;
        }

        return $data;
    }

    public function delete_space($value)
    {
        $data = str_replace(' ', '', $value);
        return $data;
    }

    public function get_list_bank(Request $request)
    {
        $user = User::all()
            ->where('id', $request->id)
            ->first();
        $rekening = ListBank::all()->where('uid', $user->email);
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

    public function add_rekening(Request $request)
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

        $data_user = User::all()
            ->where('id', $request->id)->first();

        if ($data_user->saldo < $harga) {
            return "null_saldo";
        }

        $ref_bank = referal_bank_packet::all()
            ->where('referal_id', $data_paket->id);

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
            $add->uid = $data_user->email;
            $add->service = $request->service;
            $add->no_rekening = $request->no_rekening;
            $add->username_ibank = encrypt($request->username);
            $add->password_ibank = encrypt($this->delete_space($request->password));
            $add->status = "baru";
            $add->harga = $harga;
            $add->nama_paket = $data_paket->nama_paket;
            $add->jenis = $data_paket->jenis;
            $add->referal_paket_id = $id_paket;
            $add->date = $time_now;
            $add->date_expired = $time->addDay($durasi);
            $add->save();

            if ($request->service == "MANDIRI") {
                $company = new company_mib;
                $company->uid = $data_user->email;
                $company->referal_rekening = $add->id;
                $company->company_id = $request->company;
                $company->save();
            }

            $data_user->saldo = $data_user->saldo - $harga;
            $data_user->save();

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
            $riwayat_pembelian->uid = $data_user->email;
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

            $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();
            $message_bank = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'add_bank')->first();

            if (
                $admin->status == "aktif" &&
                $message_bank->status == "aktif" &&
                $data_user->notif_wa == "aktif"
            ) {
                $change_message = $this->notif_add_bank($message_bank->message, $add, $riwayat_pembelian);
            }

            // return "berhasil";
            $count_paket = count(ListBank::all()->where('uid', $data_user->email));

            return array(
                'status' => 'berhasil',
                'count_paket' => $count_paket,
                'saldo' => $this->rupiah($data_user->saldo)
            );
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

    public function delete_rekening(Request $request)
    {
        $delete = ListBank::all()
            ->where('id', $request->id)
            ->first();

        $delete_transaksi = transaksi::all()
            ->where('uid', $delete->uid)
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

        $user = User::all()
            ->where('email', $delete->uid)
            ->first();

        $delete->delete();
        $count_paket = count(ListBank::all()
            ->where('uid', $user->email));

        return array(
            'id' => $user->id,
            'count_paket' => $count_paket
        );
    }


    public function update_rekening(Request $request)
    {

        $user = User::all()
            ->where('id', $request->user)
            ->first();

        if ($user == NULL) {
            return "null_user";
        }

        $bank = ListBank::all()
            ->where('uid', $user->email)
            ->where('id', $request->id)
            ->first();

        if ($bank == NULL) {
            return "null_bank";
        }

        $bank->status = "perbarui";
            $bank->username_ibank = encrypt($this->delete_space($request->username));
            $bank->password_ibank = encrypt($this->delete_space($request->password));
            $bank->save();

            if ($bank->service == "MANDIRI") {
                $company_id = company_mib::all()
                    ->where('uid', $user->email)
                    ->where('referal_rekening', $bank->id)
                    ->first();
                $company_id->company_id = $request->company;
                $company_id->save();
            }

            $time = Carbon::now();
            $time->setTimezone('Asia/jakarta');
            $time->format('YYYY-MM-DD hh:mm:ss');

            $log = new log_activity;
            $log->uid = $user->email;
            $log->activity = $bank->service;
            $log->kategori = "log";
            $log->status = "invisible";
            $log->date = $time->toDateTimeString();
            $log->deskripsi = 'Rekening ' . $bank->service . ' Diperbarui';
            $log->save();

            return "berhasil";
    }

    public function admin_board()
    {
        $user = User::all()->where('otoritas', 'user');
        $rekening = ListBank::all();
        $transaksi = transaksi::all();
        $paket = list_packet::all();
        $data = [];
        $data[0] = count($user); //total pengguna
        $data[1] = count($rekening); //total Rekening
        $data[2] = count($transaksi); //total Transaksi
        $data[3] = count($paket); //total Transaksi
        return $data;
    }

    public function data_user()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            return view('admin.data_user');
        } else {
            return redirect()->route('home');
        }
    }

    public function change($value)
    {
        if ($value == "tidak_aktif") {
            return "Tidak Aktif";
        } else if ($value == "aktif") {
            return "Aktif";
        }
    }

    public function ajax_user_datatables()
    {
        $array = [];
        $cek = 0;
        $data = User::orderBy('id', 'DESC')->where('otoritas', 'user')->get();
        foreach ($data as $key) {
            $integrasi = integrasi::all()->where('email', $key->email)->first();
            $output = new User;
            $output->no = $cek + 1;
            $output->integrasi = $this->change($integrasi->status);
            $output->id = $key->id;
            $output->name = $key->name;
            $output->email = $key->email;
            $output->fullname = $key->fullname;
            $output->jenis_kelamin = $key->jenis_kelamin;
            $output->alamat = $key->alamat;
            $output->kota = $key->kota;
            $output->no_hp = $key->no_hp;
            $output->notif_wa = $this->change($key->notif_wa);
            $output->otoritas = $key->otoritas;
            $output->perusahaan = $key->perusahaan;
            $output->jabatan = $key->jabatan;
            $output->api_key = $key->api_key;
            $output->api_signature = $key->api_signature;
            $output->created_at = $key->created_at;
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addColumn('action', 'admin.action.User-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function page_add_user()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            return view('admin.add_user');
        } else {
            return redirect()->route('home');
        }
    }

    public function page_update_event(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            $pengumuman = announcement::all()->where('id', $request->user_event)->first();
            $event = log_activity::all()->where('referal', $pengumuman->id)->first();
            return view('admin.update_data_event', compact('pengumuman', 'event'));
        } else {
            return redirect()->route('home');
        }
    }

    public function data_bank_wallet()
    {

        $bri = count(ListBank::all()->where('service', "BRI"));
        $bca = count(ListBank::all()->where('service', "BCA"));
        $bni = count(ListBank::all()->where('service', "BNI"));
        $mandiri = count(ListBank::all()->where('service', "MANDIRI"));
        $ovo = count(ListBank::all()->where('service', "OVO"));
        $gopay = count(ListBank::all()->where('service', "GOPAY"));
        $shoopepay = count(ListBank::all()->where('service', "SHOOPEPAY"));

        $output = array(
            "bri" => $bri,
            "bca" => $bca,
            "bni" => $bni,
            "mandiri" => $mandiri,
            "ovo" => $ovo,
            "gopay" => $gopay,
            "shoopepay" => $shoopepay,

        );
        return $output;
    }

    public function data_paket_layanan()
    {

        $bri = count(riwayat_pembelian::all()->where('service', "BRI"));
        $bca = count(riwayat_pembelian::all()->where('service', "BCA"));
        $bni = count(riwayat_pembelian::all()->where('service', "BNI"));
        $mandiri = count(riwayat_pembelian::all()->where('service', "MANDIRI"));

        $output = array(
            "bri" => $bri,
            "bca" => $bca,
            "bni" => $bni,
            "mandiri" => $mandiri,

        );
        return $output;
    }

    public function autoNotif()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            $output = [];
            $aktif = autonotif::all()
                ->where('otoritas', 'user')
                ->where('status', "aktif");
            $tidak_aktif = autonotif::all()
                ->where('otoritas', 'user')
                ->where('status', 'tidak_aktif');
            $total = count($aktif) + count($tidak_aktif);
            $output[0] = count($aktif);
            $output[1] = count($tidak_aktif);
            if ($output[1] == 0 && $output[0] == 0) {
                $output[2] = 0;
                $output[3] = 0;
            } else {
                $output[2] = ($output[0] * 100) / $total;
                $output[3] = ($output[1] * 100) / $total;
            }
            return view('admin.auto_notif', compact('output'));
        } else {
            return redirect()->route('home');
        }
    }

    public function change_status($data)
    {
        if ($data == "aktif") {
            return "Aktif";
        } else if ($data == "tidak_aktif") {
            return "Tidak Aktif";
        }
    }

    public function change_null($value)
    {
        if ($value == NULL) {
            return "-";
        } else {
            return $value;
        }
    }

    public function ajax_autonotif_datatables()
    {
        $array = [];
        $cek = 0;
        $data = autonotif::orderBy('id', 'DESC')->where('otoritas', 'user')->get();
        foreach ($data as $key) {
            $output = new User;
            $output->no = $cek + 1;
            $output->id = $key->id;
            $output->uid = $key->uid;
            $output->username = $this->change_null($key->username);
            $output->api_key = $this->change_null($key->api_key);
            $output->message = $key->message;
            $output->status = $this->change_status($key->status);
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addColumn('action', 'admin.action.autonotif-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function save_autonotif(Request $request)
    {
        $data = new autonotif;
        $data->username = $request->username;
        $data->api_key = $request->api_key;
        $data->status = $request->status;
        $data->message = $request->message;
        $data->save();
    }

    public function page_update_autonotif(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            // $data = autonotif::all()->where('id', $request->user_autonotif)->first();
            $data = autonotif::all()->where('id', $request->user_autonotif)->first();
            $data2 = phone_autonotif::all()->where('uid', $data->uid)->where('referal_autonotif', $data->id);
            $report_self = laporan_autonotif::all()->where('uid', $data->uid)->first();
            $array_phone = [];
            $cek = 0;
            foreach ($data2 as $key) {
                $output = new phone_autonotif;
                $output->uid = $key->uid;
                $output->referal_autonotif = $key->referal_autonotif;
                $output->jenis = $key->jenis;
                $output->phone = $key->phone;
                $array_phone[$cek] = $output;
                $cek++;
            }
            $total = count($array_phone);
            return view('admin.update_data_autonotif', compact('data', 'array_phone', 'total', 'report_self'));
        } else {
            return redirect()->route('home');
        }
    }

    public function send_notif_wa($username, $target, $message, $api_key)
    {
        $data = null;

        return $data;
    }

    public function update_autonotif(Request $request)
    {
        if ($request->uid == "admin") {
            $data = $this->send_notif_wa($request->username, 62123456789, "Connect Mutasi", $request->api_key);
            if ($data->status == "success") {
                $save = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();
                $save->api_key = $request->api_key;
                $save->status = $request->status;
                $save->username = $request->username;
                $save->save();
                return "success";
            } else {
                return "failed";
            }
        } else {
            $User = User::all()->where('email', $request->uid)->first();
            $data = $this->send_notif_wa($request->username, $User->no_hp, "Connect Mutasi", $request->api_key);
            if ($data->status == "success") {
                $save = autonotif::all()->where('uid', $request->uid)->first();
                $save->api_key = $request->api_key;
                $save->status = $request->status;
                $save->username = $request->username;
                $save->save();
                return "success";
            } else {
                return "failed";
            }
        }
    }

    public function save_phone_autonotif_user(Request $request)
    {
        $data = autonotif::all()->where('uid', $request->uid)->first();
        $phone = phone_autonotif::all()->where('uid', $data->uid)->where('referal_autonotif', $data->id);

        $phone_data = [];
        $cek_source = 0;
        foreach ($phone as $key) {
            $baru = new phone_autonotif;
            $baru->id = $key->id;
            $baru->uid = $key->uid;
            $baru->referal_autonotif = $key->referal_autonotif;
            $baru->jenis = $key->jenis;
            $baru->phone = $key->phone;
            $phone_data[$cek_source] = $baru;
            $cek_source++;
        }

        if (count($phone) == count($request->penerima)) {
            $cek = 0;
            foreach ($phone as $key) {
                if ($request->penerima[$cek] == $key->phone) {
                    $key->jenis = $request->jenis[$cek];
                    $key->save();
                } else {
                    $key->phone = $this->change_no_hp($request->penerima[$cek]);
                    $key->jenis = $request->jenis[$cek];
                    $key->save();
                }
                $cek++;
            }
        } else if (count($phone) > count($request->penerima)) {
            for ($i = 0; $i < count($request->penerima); $i++) {
                $update = phone_autonotif::all()->where('id', $phone_data[$i]->id)->first();
                $update->phone = $this->change_no_hp($request->penerima[$i]);
                $update->jenis = $request->jenis[$i];
                $update->save();
            }

            for ($i = count($request->penerima); $i < count($phone); $i++) {
                $update = phone_autonotif::all()->where('id', $phone_data[$i]->id)->first();
                $update->delete();
            }
        } else if (count($phone) < count($request->penerima)) {
            for ($i = 0; $i < count($phone); $i++) {
                $update = phone_autonotif::all()->where('id', $phone_data[$i]->id)->first();
                $update->phone = $this->change_no_hp($request->penerima[$i]);
                $update->jenis = $request->jenis[$i];
                $update->save();
            }

            for ($i = count($phone); $i < count($request->penerima); $i++) {
                $baru = new phone_autonotif;
                $baru->uid = $data->uid;
                $baru->referal_autonotif = $data->id;
                $baru->jenis = $request->jenis[$i];
                $baru->phone = $this->change_no_hp($request->penerima[$i]);
                $baru->save();
            }
        }
    }


    public function linegraph_admin()
    {
        $label = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "Desember",
        ];
        // $array = [10, 2, 0, 0, 0, 11, 13, 9, 13, 15, 0, 0];
        $array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        // $data = transaksi::all();
        $deposit = deposit::all()->where('status', 'berhasil');
        $riwayat_pembelian = riwayat_pembelian::all();

        foreach ($riwayat_pembelian as $key) {
            $new_date = date('Y-m-d', strtotime($key->tgl_pembelian));

            $first = new DateTime($new_date);
            $first->modify('first day of this month');

            $last = new DateTime($new_date);
            $last->modify('last day of this month');

            $month = date('m', strtotime($new_date));

            if (
                $new_date >= $first->format('Y-m-d') &&
                $new_date <= $last->format('Y-m-d')
            ) {
                $array[$month - 1]++;
            }
        }

        foreach ($deposit as $key) {
            $new_date = date('Y-m-d', strtotime($key->date));

            $first = new DateTime($new_date);
            $first->modify('first day of this month');

            $last = new DateTime($new_date);
            $last->modify('last day of this month');

            $month = date('m', strtotime($new_date));

            if (
                $new_date >= $first->format('Y-m-d') &&
                $new_date <= $last->format('Y-m-d')
            ) {
                $array[$month - 1]++;
            }
        }
        return array($label, $array);
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

    public function change_message_register($message, $data)
    {
        $data1 = str_replace("(name)", $data->name, $message);
        $data2 = str_replace("(fullname)", $data->fullname, $data1);
        $data3 = str_replace("(alamat)", $data->alamat, $data2);
        $data4 = str_replace("(kota)", $data->kota, $data3);
        $data5 = str_replace("(no_hp)", $this->change_no_hp($data->no_hp), $data4);
        $data6 = str_replace("(perusahaan)", $data->perusahaan, $data5);
        $data7 = str_replace("(jabatan)", $data->jabatan, $data6);
        $data8 = str_replace("(saldo)", "15.000", $data7);
        $data9 = str_replace("(email)", $data->email, $data8);
        $data10 = str_replace("(password)", $data->password, $data9);
        return $data10;
    }

    public function perpanjang_rekening(Request $request)
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

        $user = User::all()
            ->where('id', $request->user)
            ->first();

        if ($user == NULL) {
            return "null_user";
        }

        if ($user->saldo < $harga) {
            return "null_saldo";
        }

        $ref_bank = referal_bank_packet::all()
            ->where('referal_id', $data_paket->id);

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
            ->where('uid', $user->email)
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

            if ($data_bank_user->service != "MANDIRI" && $request->service == "MANDIRI") {
                $company_new = new company_mib;
                $company_new->uid = $user->email;
                $company_new->referal_rekening = $data_bank_user->id;
                $company_new->company_id = $request->company;
                $company_new->save();
            }

            if ($data_bank_user->service == "MANDIRI" && $request->service == "MANDIRI") {
                $company_save = company_mib::all()
                    ->where('referal_rekening', $data_bank_user->id)
                    ->first();
                $company_save->uid = $user->email;
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

            $user->saldo = $user->saldo - $harga;
            $user->save();

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
            $riwayat_pembelian->uid = $user->email;
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

            $admin = autonotif::all()
                ->where('otoritas', 'admin')
                ->where('kategori', 'admin')
                ->first();
            $message_bank = autonotif::all()
                ->where('otoritas', 'admin')
                ->where('kategori', 'add_bank')
                ->first();

            if (
                $admin->status == "aktif" &&
                $message_bank->status == "aktif" &&
                $user->notif_wa == "aktif"
            ) {
                $change_message = $this->notif_add_bank($message_bank->message, $data_bank_user, $riwayat_pembelian);
                $this->send_notif_wa($admin->username, $user->no_hp, $change_message, $admin->api_key);
            }

            return "berhasil";
        }
    }

    public function setting_admin()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            $data = User::all()
                ->where('email', Auth::user()->email)
                ->first();
            return view('admin.setting', compact('data'));
        } else {
            return redirect()->route('home');
        }
    }

    public function save_profil(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {
            $data = User::all()
                ->where('email', Auth::user()->email)
                ->first();
            $data->name = $request->username;
            $data->fullname = $request->fullname;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->kota = $request->kota;
            $data->alamat = $request->alamat;
            $data->perusahaan = $request->perusahaan;
            $data->jabatan = $request->jabatan;
            $data->save();
        }
    }

    public function save_kontak(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {

            if (!is_numeric($request->no_hp) || $request->no_hp < 0) {
                return "null_numeric";
            }

            $data = User::all()
                ->where('email', Auth::user()->email)
                ->first();

            $data->no_hp = $this->change_no_hp($request->no_hp);
            $data->save();
        }
    }

    public function change_password(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'admin') {

            if (strlen($request->password) < 8) {
                return "null_password";
            }

            $user = User::all()->where('email', Auth::User()->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
        }
    }

    public function stop_user(Request $request)
    {
        $user = User::all()->where('id', $request->user)->first();

        $bank = ListBank::all()
            ->where('id', $request->id)
            ->where('uid', $user->email)
            ->first();

        if ($bank == NULL) {
            return "null_bank";
        }

        $bank->status = "stop";
        $bank->save();

        return "berhasil";
    }
}
