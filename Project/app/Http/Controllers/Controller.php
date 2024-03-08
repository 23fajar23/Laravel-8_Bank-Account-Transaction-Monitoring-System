<?php

namespace App\Http\Controllers;

use App\Models\autonotif;
use App\Models\otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cek_email_user(HttpRequest $request)
    {
        $user = User::all()
            ->where('email', $request->email)
            ->first();

        if ($user == null) {
            return "null_user";
        } else {
            return "berhasil";
        }
    }

    public function page_otp_forgot(HttpRequest $request)
    {
        $user = User::all()
            ->where('email', $request->user_email)
            ->first();

        if ($user == null) {
            // return "null_user";
            return redirect('forgot_password');
        } else {
            $time = Carbon::now();
            $time->setTimezone('Asia/jakarta');
            $time->format('YYYY-MM-DD hh:mm:ss');

            $otp = otp::all()
                ->where('uid', $user->email)
                ->first();

            $autonotif_login = autonotif::all()
                ->where('otoritas', 'admin')
                ->where('kategori', 'admin')
                ->first();

            $autonotif_message = autonotif::all()
                ->where('otoritas', 'admin')
                ->where('kategori', 'otp')
                ->first();

            if (
                $autonotif_login->status == "aktif" &&
                $autonotif_message->status == "aktif"
            ) {
                // Begin Count Different date
                $expired = strtotime($otp->date_expired);
                $date_now = strtotime($time);
                $different_on_minutes = ($expired - $date_now) / 60;
                // End Count Different date

                if ($different_on_minutes <= 30 && $different_on_minutes >= 0) {
                    // Content for key has active
                } else {

                    $new_otp = rand(100000, 999999);
                    $message = str_replace('(otp)', $new_otp, $autonotif_message->message);
                    $send_validate = $this->otp($autonotif_login->username, $user->no_hp, $message, $autonotif_login->api_key);
                    if ($send_validate->status == "success") {
                        $otp->kode = $new_otp;
                        $otp->status_resend = "wait";
                        $otp->date_expired = $time->addMinutes(30);
                        $otp->save();
                    } else {
                        $autonotif_message->status = "tidak_aktif";
                        $autonotif_message->save();
                    }
                }
            }

            $output = array(
                "start" => substr($user->no_hp, 0, 3),
                "end" => substr($user->no_hp, -3),
                "email" => $user->email
            );

            return view('confirm_password', compact('output'));
        }
    }

    public function page_forgot_password()
    {
        return view('forgot_password');
    }

    public function verify_otp(HttpRequest $request)
    {
        $user = User::all()
            ->where('email', $request->email)
            ->first();

        if ($user == null) {
            return "null_user";
        }

        if ($request->otp == null) {
            return "null_otp";
        }

        if ($request->password == null || $request->new_password == null) {
            return "null_password";
        }

        if (strlen($request->password) < 8 || strlen($request->new_password) < 8) {
            return "null_password";
        }

        if ($request->password == $request->new_password) {
            $time = Carbon::now();
            $time->setTimezone('Asia/jakarta');
            $time->format('YYYY-MM-DD hh:mm:ss');

            $otp = otp::all()->where('uid', $user->email)->first();

            $expired = strtotime($otp->date_expired);
            $date_now = strtotime($time);
            $different_on_minutes = ($expired - $date_now) / 60;

            if ($different_on_minutes <= 30 && $different_on_minutes >= 0) {

                // Begin cek otp
                if ($otp->kode == $request->otp) {
                    $user->password = Hash::make($request->password);
                    $user->save();
                    return "success_otp";
                } else {
                    return "failed_otp";
                }
                // End cek otp

            } else {
                return "refresh";
            }

            // return "sama -> proses";
        } else {
            return "password_invalid";
        }
    }

    public function otp($username, $target, $message, $api_key)
    {
        $data = null;

        return $data;
    }
}
