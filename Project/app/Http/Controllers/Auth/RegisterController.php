<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\autonotif;
use App\Models\laporan_autonotif;
use App\Models\otp;
use App\Models\phone_autonotif;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:255'],
            'perusahaan' => ['nullable', 'string', 'max:255'],
            'jabatan' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (strlen($data['password']) < 8) {
            return redirect()->route('register');
        }

        if (!is_numeric($data['no_hp'])) {
            return redirect()->route('register');
        }

        $api_key = md5($data['email']);
        $api_signature = md5($data['password'] . $data['email']);

        // Begin Send OTP
        $admin = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();

        // Begin Delete data before create new data if any have error in mysql
        $cek_autonotif = autonotif::all()->where('uid', $data['email']);
        $cek_phone = phone_autonotif::all()->where('uid', $data['email']);
        $cek_laporan_autonotif = laporan_autonotif::all()->where('uid', $data['email']);
        $cek_otp = otp::all()->where('uid', $data['email']);

        $this->delete_data($cek_autonotif);
        $this->delete_data($cek_phone);
        $this->delete_data($cek_laporan_autonotif);
        $this->delete_data($cek_otp);
        // End Delete data before create new data if any have error in mysql

        DB::table('integrasis')->insert(
            [
                'email'              => $data['email'],
                'status'             => "tidak_aktif",
                'api_key'            => Hash::make($api_key),
                'api_signature'      => Hash::make($api_signature),
                'url'                => NULL
            ]
        );

        $autonotif = new autonotif;
        $autonotif->uid = $data['email'];
        $autonotif->username = NULL;
        $autonotif->api_key = NULL;
        $autonotif->kategori = "user";
        $autonotif->otoritas = "user";
        $autonotif->message = "Telah terjadi transaksi sebesar Rp(nominal) di rekening (no_rekening) dengan jenis tansaksi (jenis_transaksi) pada tanggal (tgl_transaksi)";
        $autonotif->status = "tidak_aktif";
        $autonotif->save();

        $phone = new phone_autonotif;
        $phone->uid = $data['email'];
        $phone->referal_autonotif = $autonotif->id;
        $phone->jenis = "semua";
        $phone->phone = $this->change_no_hp($data['no_hp']);
        $phone->save();

        $self_report = new laporan_autonotif;
        $self_report->uid = $data['email'];
        $self_report->status = "tidak_aktif";
        $self_report->message = "Notifikasi transaksi sebesar Rp(nominal) pada rekening (no_rekening) berhasil dikirim.";
        $self_report->save();

        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $self = new otp;
        $self->uid = $data['email'];
        $self->kode = rand(100000, 999999);
        $self->status_resend = "available";
        $self->date_expired = $time->addMinutes(30);
        $self->save();

        $message_otp = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'otp')->first();
        $message_register = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'register')->first();
        $change_message = str_replace("(otp)", $self->kode, $message_otp->message);
        $change_register = $this->change_message_register($message_register->message, $data);

        if (
            $admin->status == "aktif"
        ) {
            if ($message_otp->status == "aktif") {
                $this->notif_wa($admin->username, $this->change_no_hp($data['no_hp']), $change_message, $admin->api_key);
            }

            if ($message_register->status == "aktif") {
                $this->notif_wa($admin->username, $this->change_no_hp($data['no_hp']), $change_register, $admin->api_key);
            }
        }

        // End Send OTP

        return User::create([
            'name' => $data['name'],
            'fullname' => $data['fullname'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat' => $data['alamat'],
            'kota' => $data['kota'],
            'no_hp' => $this->change_no_hp($data['no_hp']),
            'api_key' => $api_key,
            'api_signature' => $api_signature,
            'otoritas' => 'user',
            'notif_wa' => 'aktif',
            'status' => 'baru',
            'saldo' => '15000',
            'perusahaan' => $data['perusahaan'],
            'jabatan' => $data['jabatan'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function change_message_register($message, $data)
    {
        $data1 = str_replace("(name)", $data['name'], $message);
        $data2 = str_replace("(fullname)", $data['fullname'], $data1);
        $data3 = str_replace("(alamat)", $data['alamat'], $data2);
        $data4 = str_replace("(kota)", $data['kota'], $data3);
        $data5 = str_replace("(no_hp)", $this->change_no_hp($data['no_hp']), $data4);
        $data6 = str_replace("(perusahaan)", $data['perusahaan'], $data5);
        $data7 = str_replace("(jabatan)", $data['jabatan'], $data6);
        $data8 = str_replace("(saldo)", "15.000", $data7);
        $data9 = str_replace("(email)", $data['email'], $data8);
        $data10 = str_replace("(password)", $data['password'], $data9);
        return $data10;
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

    public function notif_wa($username, $target, $message, $api_key)
    {
        $data = null;

        return $data;
    }
}
