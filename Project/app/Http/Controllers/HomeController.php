<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\autonotif;
use App\Models\laporan_autonotif;
use App\Models\list_packet;
use App\Models\ListBank;
use App\Models\log_activity;
use App\Models\otp;
use App\Models\phone_autonotif;
use App\Models\riwayat_pembelian;
use App\Models\testimoni;
use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::User()->status == "aktif") {
            if (Auth::user()->otoritas == 'admin') {
                return view('admin/home');
            } else if (Auth::user()->otoritas == 'user') {
                Auth::user()->saldo = $this->rupiah(Auth::user()->saldo);
                $riwayat_pembelian = count(riwayat_pembelian::all()->where('uid', Auth::user()->email));
                $data = count(ListBank::all()->where('uid', Auth::user()->email));
                $transaksi = count(transaksi::all()->where('uid', Auth::user()->email));
                $pengumuman = announcement::all()->where('status', 'aktif');
                return view('home', compact('data', 'transaksi', 'pengumuman', 'riwayat_pembelian'));
            }
        } else {
            $time = Carbon::now();
            $time->setTimezone('Asia/jakarta');
            $time->format('YYYY-MM-DD hh:mm:ss');

            // Begin Autonotif OTP
            $data = User::all()->where('email', Auth::User()->email)->first();
            $otp = otp::all()->where('uid', Auth::User()->email)->first();

            // Data Api_key
            $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();

            // Data Message
            $message_otp = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'otp')->first();

            if ($admin->status == "aktif" && $message_otp->status == "aktif") {

                // Begin Count Different date
                $expired = strtotime($otp->date_expired);
                $date_now = strtotime($time);
                $different_on_minutes = ($expired - $date_now) / 60;
                // End Count Different date

                if ($different_on_minutes <= 30 && $different_on_minutes >= 0) {
                    // Content for key has active
                } else {
                    $new_otp = rand(100000, 999999);
                    $message = str_replace('(otp)', $new_otp, $message_otp->message);
                    $send_validate = $this->otp($admin->username, $data->no_hp, $message, $admin->api_key);
                    if ($send_validate->status == "success") {
                        $otp->kode = $new_otp;
                        $otp->status_resend = "wait";
                        $otp->date_expired = $time->addMinutes(30);
                        $otp->save();
                    } else {
                        $admin->status = "tidak_aktif";
                        $admin->save();
                    }
                }
            }
            // End Autonotif OTP

            return view('verify_otp', compact('data', 'otp'));
        }
    }

    public function profil()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {
            $data = User::all()->where('email', Auth::user()->email)->first();
            return view('user.profil', compact('data'));
        } else {
            return redirect()->route('home');
        }
    }

    public function rupiah($rupiah)
    {
        $hasil_rupiah = number_format($rupiah, 0, ',', '.');
        return $hasil_rupiah;
    }


    public function get_user_data()
    {
        $data = User::all()->where('email', Auth::user()->email)->first();
        return $data;
    }

    public function change_password(Request $request)
    {
        if (strlen($request->password) < 8) {
            return "null_password";
        }

        $user = User::all()->where('email', Auth::User()->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $log = new log_activity;
        $log->uid = Auth::user()->email;
        $log->activity = "password";
        $log->kategori = "log";
        $log->status = "invisible";
        $log->date = $time->toDateTimeString();
        $log->deskripsi = 'Kata Sandi Telah Diubah';
        $log->save();
    }

    public function profil_data(Request $request)
    {
        $data = User::all()->where('email', Auth::user()->email)->first();
        $data->name = $request->username;
        $data->fullname = $request->fullname;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->kota = $request->kota;
        $data->alamat = $request->alamat;
        $data->perusahaan = $request->perusahaan;
        $data->jabatan = $request->jabatan;
        $data->save();

        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $log = new log_activity;
        $log->uid = Auth::user()->email;
        $log->activity = "profil";
        $log->kategori = "log";
        $log->status = "invisible";
        $log->date = $time->toDateTimeString();
        $log->deskripsi = 'Data Profil Telah Diubah';
        $log->save();
    }

    public function send_kontak(Request $request)
    {
        if (!is_numeric($request->no_hp) || $request->no_hp < 0) {
            return "null_numeric";
        }

        $data = User::all()->where('email', Auth::user()->email)->first();
        $data->no_hp = $this->change_no_hp($request->no_hp);
        $data->save();

        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $log = new log_activity;
        $log->uid = Auth::user()->email;
        $log->activity = "kontak";
        $log->kategori = "log";
        $log->status = "invisible";
        $log->date = $time->toDateTimeString();
        $log->deskripsi = 'Data Kontak Telah Diubah';
        $log->save();
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

    public function getPengumuman()
    {
        $data = announcement::orderBy('id', 'DESC')->where('status', 'aktif')->get();
        foreach ($data as $hasil) {
            $hasil->date = date('H:i d-M-Y', strtotime($hasil->date));
        }
        return $data;
    }

    public function testimoni(Request $request)
    {
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $data = new testimoni;
        $data->uid = Auth::user()->email;
        $data->comment = $request->id;
        $data->date = $time->toDateTimeString();
        $data->save();
    }

    public function page_info_rekening()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif' || Auth::user()->otoritas == 'admin') {
            return view('user.info_rekening');
        } else {
            return redirect()->route('home');
        }
    }

    public function page_autonotif()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {
            $data = autonotif::all()->where('uid', Auth::User()->email)->first();
            $data2 = phone_autonotif::all()->where('uid', Auth::User()->email)->where('referal_autonotif', $data->id);
            $report_self = laporan_autonotif::all()->where('uid', Auth::User()->email)->first();
            $array_phone = [];
            $cek = 0;
            foreach ($data2 as $key) {
                $output = new phone_autonotif();
                $output->uid = $key->uid;
                $output->referal_autonotif = $key->referal_autonotif;
                $output->jenis = $key->jenis;
                $output->phone = $key->phone;
                $array_phone[$cek] = $output;
                $cek++;
            }
            $total = count($array_phone);
            return view('user.data_autonotif', compact('data', 'array_phone', 'total', 'report_self'));
        } else {
            return redirect()->route('home');
        }
    }

    public function otp($username, $target, $message, $api_key)
    {
        $data = null;

        return $data;
    }
}
