<?php

namespace App\Http\Controllers;

use App\Models\autonotif;
use App\Models\otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class autonotifAdminController extends Controller
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
            $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();
            $otp = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'otp')->first();
            $register = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'register')->first();
            $add_bank = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'add_bank')->first();
            $paket_expired = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'paket_expired')->first();
            $gagal_scrap = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'gagal_scrap')->first();
            $topup = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'top_up')->first();
            $payment_success = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'payment_success')->first();
            $payment_failed = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'payment_failed')->first();
            $paket_harian_delete = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'paket_harian_delete')->first();
            $paket_harian_saldo = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'paket_harian_saldo')->first();
            $paket_harian_perpanjangan = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'paket_harian_perpanjangan')->first();

            $data_autonotif =  array(
                'otp' => $otp,
                'register' => $register,
                'add_bank' => $add_bank,
                'paket_expired' => $paket_expired,
                'gagal_scrap' => $gagal_scrap,
                'topup' => $topup,
                'payment_success' => $payment_success,
                'payment_failed' => $payment_failed,
                'paket_harian_delete' => $paket_harian_delete,
                'paket_harian_saldo' => $paket_harian_saldo,
                'paket_harian_perpanjangan' => $paket_harian_perpanjangan,
            );

            return view('admin.data_autonotif', compact('admin', 'data_autonotif'));
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
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $user = User::all()->where('email', Auth::User()->email)->first();
        $otp = otp::all()->where('uid', Auth::User()->email)->first();

        $expired = strtotime($otp->date_expired);
        $date_now = strtotime($time);
        $different_on_minutes = ($expired - $date_now) / 60;

        if ($different_on_minutes <= 30 && $different_on_minutes >= 0) {

            // Begin cek otp
            if ($otp->kode == $request->otp) {
                $user->status = "aktif";
                $user->save();
                return "berhasil";
            } else {
                return "gagal";
            }
            // End cek otp

        } else {
            return "refresh";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (
            $request->type == "otp" ||
            $request->type == "register" ||
            $request->type == "add_bank" ||
            $request->type == "paket_expired" ||
            $request->type == "gagal_scrap" ||
            $request->type == "top_up" ||
            $request->type == "payment_success" ||
            $request->type == "payment_failed" ||
            $request->type == "paket_harian_delete" ||
            $request->type == "paket_harian_saldo" ||
            $request->type == "paket_harian_perpanjangan"
        ) {
            # code...
        } else {
            return "null_type";
        }

        if ($request->status == "aktif" || $request->status == "tidak_aktif") {
        } else {
            return "null_status";
        }

        $data = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', $request->type)
            ->first();
        $data->message = $request->message;
        $data->status = $request->status;
        $data->save();

        return "berhasil";
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

    public function send_fast_message(Request $request)
    {
        if ($request->status_autonotif == "admin") {
            $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();
            $api_key = $admin->api_key;
            $username = $admin->username;
        } else {
            $api_key = $request->api_key;
            $username = $request->username;
        }

        $data = [];

        if ($request->status_penerima == "all_user") {
            $user = User::all()->where('otoritas', 'user');
            $count = 0;
            foreach ($user as $key) {
                $cek =  $this->otp($username, $this->change_no_hp($key->no_hp), $request->message, $api_key);
                if ($cek->status == "success") {
                    $data[$count] = "success";
                } else {
                    $data[$count] = "failed";
                }
                $count++;
            }
        } else {
            foreach ($request->phone as $no_hp) {
                $cek = $this->otp($username, $this->change_no_hp($no_hp), $request->message, $api_key);
                $count2 = 0;
                if ($cek->status == "success") {
                    $data[$count2] = "success";
                } else {
                    $data[$count2] = "failed";
                }
                $count2++;
            }
        }

        $output = "success";
        foreach ($data as $key) {
            if ($key == "failed") {
                $output = "failed";
            }
        }

        return $output;
    }

    public function change_to_enable(Request $request)
    {
        $data = otp::all()->where('uid', Auth::User()->email)->first();
        $data->status_resend = "available";
        $data->save();
    }

    public function change_to_disabled(Request $request)
    {
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $data = otp::all()->where('uid', Auth::User()->email)->first();
        $data->status_resend = "wait";
        $data->kode = rand(100000, 999999);
        $data->date_expired = $time->addMinutes(30);
        $data->save();

        // Key Data
        $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->where('status', 'aktif')->first();

        // MEssage OTP
        $message_otp = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'otp')->first();
        $message = str_replace('(otp)', $data->kode, $message_otp->message);
        $this->otp($admin->username, Auth::User()->no_hp, $message, $admin->api_key);
    }

    public function otp($username, $target, $message, $api_key)
    {
        $data = null;
        return $data;
    }
}
