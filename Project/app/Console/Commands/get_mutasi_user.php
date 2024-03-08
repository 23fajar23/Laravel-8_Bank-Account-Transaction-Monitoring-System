<?php

namespace App\Console\Commands;

use App\Models\autonotif;
use App\Models\company_mib;
use App\Models\integrasi;
use App\Models\laporan_autonotif;
use App\Models\list_packet;
use App\Models\ListBank;
use App\Models\log_activity;
use App\Models\phone_autonotif;
use App\Models\track_message;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;

class get_mutasi_user extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_mutasi_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    /*
    |----------------------------------------
    | BEGIN BCA DATA
    |----------------------------------------
    */

    public function tipe_bca($value)
    {
        if ($value == "DB") {
            return "DEBIT";
        } else if ($value == "CR") {
            return "KREDIT";
        }
    }

    public function remove_number_format_bca($value)
    {
        $nominal = intval(preg_replace('/[^\d.]/', '', $value));
        return $nominal;
    }

    public function tgl_bca($tgl)
    {
        date_default_timezone_set("Asia/Jakarta");
        $change = str_replace('/', '-', $tgl);
        $date = date($change . '-Y');
        $new_date = date("Y-m-d", strtotime($date));
        return $new_date;
    }

    /*
    |----------------------------------------
    | END BCA DATA
    |----------------------------------------
    */



    /*
    |----------------------------------------
    | BEGIN BRI DATA
    |----------------------------------------
    */

    public function tipe_bri($value)
    {
        if ($value == "debet") {
            return "DEBIT";
        } else if ($value == "kredit") {
            return "KREDIT";
        }
    }

    public function remove_number_format_bri($value)
    {
        $nominal = preg_replace('/[.]/', '', $value);
        $output = substr($nominal, 0, -2);
        return $output;
    }

    public function tgl_bri($tgl)
    {
        date_default_timezone_set("Asia/Jakarta");
        $output = substr($tgl, 0, -3);
        $change = str_replace('/', '-', $output);
        $date = date($change  . '-Y');
        $new_date = date("Y-m-d", strtotime($date));
        return $new_date;
    }

    /*
    |----------------------------------------
    | END BRI DATA
    |----------------------------------------
    */

    /*
    |----------------------------------------
    | BEGIN MANDIRI DATA
    |----------------------------------------
    */

    public function tipe_mandiri($debit, $kredit)
    {
        if ($debit == "0.00") {
            return "KREDIT";
        } else if ($kredit == "0.00") {
            return "DEBIT";
        }
    }

    public function nominal_number_format_mandiri($debit, $kredit)
    {
        if ($debit == "0.00") {
            $nominal = preg_replace('/[.]/', '', $kredit);
            $data = substr($nominal, 0, -2);
            $output = preg_replace('/[,]/', '', $data);
            return $output;
        } else if ($kredit == "0.00") {
            $nominal = preg_replace('/[.]/', '', $debit);
            $data = substr($nominal, 0, -2);
            $output = preg_replace('/[,]/', '', $data);
            return $output;
        }
    }

    public function tgl_mandiri($tgl)
    {
        date_default_timezone_set("Asia/Jakarta");
        $change = str_replace('/', '-', $tgl);
        $new_date = date("Y-m-d", strtotime($change));
        return $new_date;
    }

    /*
    |----------------------------------------
    | END MANDIRI DATA
    |----------------------------------------
    */

    /*
    |----------------------------------------
    | BEGIN BNI DATA
    |----------------------------------------
    */

    public function tipe_bni($value)
    {
        $data = str_replace('.', '', $value);
        $data1 = str_replace(chr(194) . chr(160), '', $data);
        if ($data1 == "Db") {
            return "DEBIT";
        } else if ($data1 == "Cr") {
            return "KREDIT";
        }
    }

    public function remove_number_format_bni($value)
    {
        $nominal = preg_replace('/[.]/', '', $value);
        $data = substr($nominal, 0, -2);
        $output = preg_replace('/[,]/', '', $data);
        return $output;
    }

    public function tgl_bni($tgl)
    {
        date_default_timezone_set("Asia/Jakarta");
        $new_date = date("Y-m-d", strtotime($tgl));
        return $new_date;
    }

    /*
    |----------------------------------------
    | END BNI DATA
    |----------------------------------------
    */

    public function save_transaksi($data, $bank)
    {
        if ($data->status == "ERROR") {
            // Begin Change Status
            if ($data->error_code == 704) {
                $this->code_704($bank->id);
            } else if ($data->error_code == 705) {
                $this->code_705($bank->id);
            } else if ($data->error_code == 706) {
                $this->code_706($bank->id);
            } else if ($data->error_code == 707) {
                $this->code_707($bank->id);
            }
            // End Change Status
        } else {
            // Begin Change Status
            $update = ListBank::all()->where('id', $bank->id)->first();
            $update->status = "berhasil";
            $update->save();
            // End Change Status

            $cek_transaksi = transaksi::all()
                ->where('uid', $bank->uid)
                ->where('referal_bank', $bank->id)
                ->where('no_rekening', $bank->no_rekening)
                ->where('service', $bank->service);

            $cek_url = integrasi::all()->where('email', $bank->uid)->first();

            if ($bank->service == "BCA") {
                foreach ($data->data->response as $key) {

                    $bca_transaksi = new transaksi;
                    $bca_transaksi->uid = $bank->uid;
                    $bca_transaksi->referal_bank = $bank->id;
                    $bca_transaksi->no_rekening = $bank->no_rekening;
                    $bca_transaksi->service = $bank->service;

                    $bca_transaksi->deskripsi = $key->keterangan;
                    $bca_transaksi->tipe = $this->tipe_bca($key->mutasi);
                    $bca_transaksi->tgl_transaksi = $this->tgl_bca($key->tanggal);

                    if ($key->tanggal == "PEND") {
                        $dt = Carbon::now();
                        $dt->setTimezone('Asia/jakarta');
                        $dt->format('YYYY-MM-DD hh:mm:ss');
                        $bca_transaksi->tgl_transaksi = date("Y-m-d", strtotime($dt));
                    }

                    $bca_transaksi->nominal = $this->remove_number_format_bca($key->nominal);
                    $bca_transaksi->saldo = $key->saldoakhir;

                    $cek_bca_save = $this->validate_same_data($bca_transaksi, $cek_transaksi);
                    if ($key->tanggal == "Total Credits" || $key->tanggal == "Total Debits") {
                        $cek_bca_save = 1;
                    }

                    if ($cek_bca_save == 0) {
                        $bca_transaksi->save();
                        $this->send_data($cek_url->url, $bca_transaksi, $cek_url->status);
                        $this->search_autonotif($bca_transaksi);
                    }
                }
            }

            if ($bank->service == "BRI") {
                foreach ($data->data->response as $key) {
                    $bri_transaksi = new transaksi;
                    $bri_transaksi->uid = $bank->uid;
                    $bri_transaksi->referal_bank = $bank->id;
                    $bri_transaksi->no_rekening = $bank->no_rekening;
                    $bri_transaksi->service = $bank->service;

                    $bri_transaksi->deskripsi = $key->description;
                    $bri_transaksi->tipe = $this->tipe_bri($key->type);
                    $bri_transaksi->tgl_transaksi = $this->tgl_bri($key->date);
                    $bri_transaksi->nominal = $this->remove_number_format_bri($key->jumlah);
                    $bri_transaksi->saldo = $key->saldo;

                    $cek_bri_save = $this->validate_same_data($bri_transaksi, $cek_transaksi);
                    if ($cek_bri_save == 0) {
                        $bri_transaksi->save();
                        $this->send_data($cek_url->url, $bri_transaksi, $cek_url->status);
                        $this->search_autonotif($bri_transaksi);
                    }
                }
            }

            if ($bank->service == "BNI") {
                foreach ($data->data->response as $key) {
                    $bni_transaksi = new transaksi;
                    $bni_transaksi->uid = $bank->uid;
                    $bni_transaksi->referal_bank = $bank->id;
                    $bni_transaksi->no_rekening = $bank->no_rekening;
                    $bni_transaksi->service = $bank->service;

                    $bni_transaksi->deskripsi = $key->keterangan;
                    $bni_transaksi->tipe = $this->tipe_bni($key->mutasi);
                    $bni_transaksi->tgl_transaksi = $this->tgl_bni($key->tanggal);
                    $bni_transaksi->nominal = $this->remove_number_format_bni($key->nominal);
                    $bni_transaksi->saldo = $key->saldoakhir;

                    $cek_bni_save = $this->validate_same_data($bni_transaksi, $cek_transaksi);
                    if ($cek_bni_save == 0) {
                        $bni_transaksi->save();
                        $this->send_data($cek_url->url, $bni_transaksi, $cek_url->status);
                        $this->search_autonotif($bni_transaksi);
                    }
                }
            }

            if ($bank->service == "MANDIRI") {
                foreach ($data->data->response as $key) {
                    $mandiri_transaksi = new transaksi;
                    $mandiri_transaksi->uid = $bank->uid;
                    $mandiri_transaksi->referal_bank = $bank->id;
                    $mandiri_transaksi->no_rekening = $bank->no_rekening;
                    $mandiri_transaksi->service = $bank->service;

                    $mandiri_transaksi->deskripsi = $key->desc;
                    $mandiri_transaksi->tipe = $this->tipe_mandiri($key->debit, $key->kredit);
                    $mandiri_transaksi->tgl_transaksi = $this->tgl_mandiri($key->date);
                    $mandiri_transaksi->nominal = $this->nominal_number_format_mandiri($key->debit, $key->kredit);
                    $mandiri_transaksi->saldo = $key->fulldate;

                    $cek_mandiri_save = $this->validate_same_data($mandiri_transaksi, $cek_transaksi);
                    if ($cek_mandiri_save == 0) {
                        $mandiri_transaksi->save();
                        $this->send_data($cek_url->url, $mandiri_transaksi, $cek_url->status);
                        $this->search_autonotif($mandiri_transaksi);
                    }
                }
            }
        }
    }

    public function validate_same_data($source, $all_data)
    {
        $accept = 0;
        foreach ($all_data as $data_transaksi) {
            if (
                $data_transaksi->tipe == $source->tipe &&
                $data_transaksi->deskripsi == $source->deskripsi &&
                $data_transaksi->tgl_transaksi == $source->tgl_transaksi &&
                $data_transaksi->saldo == $source->saldo &&
                $data_transaksi->nominal == $source->nominal
            ) {
                $accept = 1;
            }
        }

        return $accept;
    }

    public function handle()
    {
        $url_token_mib = env('API_LINK') . "api/mandiriib/token";
        $url_mutasi_mib = env('API_LINK') . "api/mandiriib/mutasi";
        $url_token_bca = env('API_LINK') . "api/bca/token";
        $url_mutasi_bca = env('API_LINK') . "api/bca/mutasi";
        $url_token_bri = env('API_LINK') . "api/bri/token";
        $url_mutasi_bri = env('API_LINK') . "api/bri/mutasi";
        $url_token_bni = env('API_LINK') . "api/bni/token";
        $url_mutasi_bni = env('API_LINK') . "api/bni/mutasi";

        $autonotif_login = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'admin')
            ->first();

        $autonotif_expired_bank = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'paket_expired')
            ->first();

        $autonotif_harian_saldo = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'paket_harian_saldo')
            ->first();

        $autonotif_harian_perpanjangan = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'paket_harian_perpanjangan')
            ->first();

        $rekening = ListBank::all();
        foreach ($rekening as $bank) {

            $autonotif_user = User::all()
                ->where('email', $bank->uid)
                ->first();

            $time_cek = Carbon::now();
            $time_cek->setTimezone('Asia/jakarta');
            $time_cek->format('YYYY-MM-DD hh:mm:ss');

            $expired = strtotime($bank->date_expired);
            $date_now = strtotime($time_cek);
            $cek_masa_aktif = $expired - $date_now;

            if ($bank->jenis == "harian") {
                // Daily packet
                if ($cek_masa_aktif <= 0) {
                    $min_saldo = User::all()
                        ->where('email', $bank->uid)
                        ->first();

                    $paket = list_packet::all()
                        ->where('id', $bank->referal_paket_id)
                        ->first();

                    if ($min_saldo->saldo >= $paket->harga) {

                        $time_refresh = Carbon::now();
                        $time_refresh->setTimezone('Asia/jakarta');
                        $time_refresh->format('YYYY-MM-DD hh:mm:ss');

                        $time_now_refresh = Carbon::now();
                        $time_now_refresh->setTimezone('Asia/jakarta');
                        $time_now_refresh->format('YYYY-MM-DD hh:mm:ss');

                        $min_saldo->saldo = $min_saldo->saldo - $paket->harga;
                        $min_saldo->save();

                        $bank->status = "perbarui";
                        $bank->date = $time_now_refresh;
                        $bank->date_expired = $time_refresh->addDay($paket->durasi);
                        $bank->save();

                        if (
                            $autonotif_login->status == "aktif" &&
                            $autonotif_harian_perpanjangan->status == "aktif" &&
                            $autonotif_user->status == "aktif"
                        ) {
                            $message_perpanjangan = $this->message_bank_data($autonotif_harian_perpanjangan->message, $bank);
                            $this->send_notif_wa($autonotif_login->username, $autonotif_user->no_hp, $message_perpanjangan, $autonotif_login->api_key);
                        }
                    } else {

                        if ($bank->status != "expired" && $bank->status != "stop") {
                            if (
                                $autonotif_login->status == "aktif" &&
                                $autonotif_harian_saldo->status == "aktif" &&
                                $autonotif_user->status == "aktif"
                            ) {
                                $message_harian_saldo = $this->message_bank_data($autonotif_harian_saldo->message, $bank);
                                $this->send_notif_wa($autonotif_login->username, $autonotif_user->no_hp, $message_harian_saldo, $autonotif_login->api_key);
                            }
                        }

                        if ($bank->status != "stop") {
                            $bank->status = "expired";
                            $bank->save();
                        }
                    }
                }
            } else {
                // Normal packet
                if ($cek_masa_aktif <= 0 && $bank->status != "expired") {
                    $bank->status = "expired";
                    $bank->save();

                    if (
                        $autonotif_login->status == "aktif" &&
                        $autonotif_expired_bank->status == "aktif" &&
                        $autonotif_user->status == "aktif"
                    ) {
                        $message_expired = $this->message_bank_data($autonotif_expired_bank->message, $bank);
                        $this->send_notif_wa($autonotif_login->username, $autonotif_user->no_hp, $message_expired, $autonotif_login->api_key);
                    }
                }
            }

            try {
                $bank->username_ibank = decrypt($bank->username_ibank);
            } catch (\Throwable $th) {
                $bank->username_ibank = "Perbarui";
            }

            try {
                $bank->password_ibank = decrypt($bank->password_ibank);
            } catch (\Throwable $th) {
                $bank->password_ibank = "123456";
            }

            if (
                $bank->status == "gagal" ||
                $bank->status == "expired" ||
                $bank->status == "stop"
            ) {
            } else {
                if ($bank->service == "MANDIRI") {
                    $company = company_mib::all()->where('referal_rekening', $bank->id)->first();
                    $data_mandiri = $this->take_data_bank_mib(
                        $url_token_mib,
                        $company->company_id,
                        $bank->username_ibank,
                        $bank->password_ibank,
                        $bank->no_rekening,
                        $url_mutasi_mib
                    );

                    $this->save_transaksi($data_mandiri, $bank);
                } else if ($bank->service == "BCA") {
                    $data_bca = $this->take_data_bank(
                        $url_token_bca,
                        $bank->username_ibank,
                        $bank->password_ibank,
                        $bank->no_rekening,
                        $url_mutasi_bca
                    );

                    $this->save_transaksi($data_bca, $bank);
                } else if ($bank->service == "BRI") {
                    $data_bri = $this->take_data_bank(
                        $url_token_bri,
                        $bank->username_ibank,
                        $bank->password_ibank,
                        $bank->no_rekening,
                        $url_mutasi_bri
                    );

                    $this->save_transaksi($data_bri, $bank);
                } else if ($bank->service == "BNI") {
                    $data_bni = $this->take_data_bank(
                        $url_token_bni,
                        $bank->username_ibank,
                        $bank->password_ibank,
                        $bank->no_rekening,
                        $url_mutasi_bni
                    );

                    $this->save_transaksi($data_bni, $bank);
                }
            }
        }
    }

    public function message_bank_data($message, $data_bank)
    {

        $different_expired = strtotime($data_bank->date_expired);
        $different_buy = strtotime($data_bank->date);
        $different_on_minutes = ($different_expired - $different_buy) / 60;
        $different_on_day = $different_on_minutes / 1440;

        $change1 = str_replace("(service)", $data_bank->service, $message);
        $change2 = str_replace("(no_rekening)", $data_bank->no_rekening, $change1);
        $change3 = str_replace("(nama_paket)", $data_bank->nama_paket, $change2);
        $change4 = str_replace("(harga)", $this->rupiah($data_bank->harga), $change3);
        $change5 = str_replace("(durasi)", $different_on_day, $change4);
        $change6 = str_replace("(date)", date("d-m-Y (H:i)", strtotime($data_bank->date)), $change5);
        $change7 = str_replace("(expired)", date("d-m-Y (H:i)", strtotime($data_bank->date_expired)), $change6);

        return $change7;
    }

    public function take_data_bank($url_token, $username, $password, $rekening, $url_mutasi)
    {
        $token = curl_init();

        curl_setopt_array($token, array(
            CURLOPT_URL => $url_token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'username=' . $username . '&password=' . $password,
            CURLOPT_HTTPHEADER => array(
                'validation: ' . env('SCRAP_CODE'),
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $key = curl_exec($token);

        curl_close($token);


        //Cek Mutasi
        $mutasi = curl_init();
        $data_token = json_decode($key);

        curl_setopt_array($mutasi, array(
            CURLOPT_URL => $url_mutasi,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'account_number=' . $rekening,
            CURLOPT_HTTPHEADER => array(
                'key: ' . $data_token->data->key,
                'token: ' . $data_token->data->token,
                'validation: ' . env('SCRAP_CODE'),
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($mutasi);
        curl_close($mutasi);
        $data_mutasi = json_decode($response);

        return $data_mutasi;
    }

    public function take_data_bank_mib($url_token, $compID, $username, $password, $rekening, $url_mutasi)
    {
        $token = curl_init();

        curl_setopt_array($token, array(
            CURLOPT_URL => $url_token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'compid=' . $compID . '&username=' . $username . '&password=' . $password,
            CURLOPT_HTTPHEADER => array(
                'validation: ' . env('SCRAP_CODE'),
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $key = curl_exec($token);

        curl_close($token);

        $mutasi = curl_init();
        $data_token = json_decode($key);

        curl_setopt_array($mutasi, array(
            CURLOPT_URL => $url_mutasi,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'account_number=' . $rekening,
            CURLOPT_HTTPHEADER => array(
                'key: ' . $data_token->data->key,
                'token: ' . $data_token->data->token,
                'validation: ' . env('SCRAP_CODE'),
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($mutasi);
        curl_close($mutasi);
        $data_mutasi = json_decode($response);

        return $data_mutasi;
    }

    /*
    |----------------------------------------
    | BEGIN SETTING AUTO NOTIF
    |----------------------------------------
    */

    public function search_autonotif($data)
    {
        $user = User::all()->where('email', $data->uid)->first();
        $this->array_data_autonotif($data, $user);
    }

    public function change_message($data, $message)
    {
        $data0 = str_replace('(nominal)', $this->format_rupiah($data->nominal), $message);
        $data1 = str_replace('(service)', $data->service, $data0);
        $data2 = str_replace('(no_rekening)', $data->no_rekening, $data1);
        $data3 = str_replace('(jenis_transaksi)', $data->tipe, $data2);
        $data4 = str_replace('(tgl_transaksi)', $this->change_date($data->tgl_transaksi), $data3);
        return $data4;
    }

    public function format_rupiah($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function change_date($tgl)
    {
        $date = date("d M Y", strtotime($tgl));
        return $date;
    }

    public function change_message_status($value)
    {
        if ($value == "success") {
            return "berhasil";
        } else if ($value == "Unauthorized") {
            return "gagal";
        }
    }

    public function change_message_report($data, $message, $status)
    {
        $data0 = str_replace('(nominal)', $this->format_rupiah($data->nominal), $message);
        $data1 = str_replace('(service)', $data->service, $data0);
        $data2 = str_replace('(no_rekening)', $data->no_rekening, $data1);
        $data3 = str_replace('(jenis_transaksi)', $data->tipe, $data2);
        $data4 = str_replace('(tgl_transaksi)', $this->change_date($data->tgl_transaksi), $data3);
        $data5 = str_replace('(status)', $status, $data4);
        return $data5;
    }

    public function array_data_autonotif($data, $user)
    {
        $autonotif = autonotif::all()->where('otoritas', 'user')->where('uid', $data->uid)->first();
        $phone_receive = phone_autonotif::all()->where('uid', $data->uid);
        $message = $this->change_message($data, $autonotif->message);

        if ($autonotif->status == "aktif") {
            foreach ($phone_receive as $phone) {

                if ($data->tipe == "KREDIT" && $phone->jenis == "kredit") {
                    $notif =  $this->send_notif_wa($autonotif->username, $phone->phone, $message, $autonotif->api_key);
                    $this->save_send_notif($data, $autonotif, $phone, $message, $notif->status);
                    $this->save_laporan_notif($data, $autonotif, $user, $notif->status);
                }

                if ($data->tipe == "DEBIT" && $phone->jenis == "debit") {
                    $notif2 =  $this->send_notif_wa($autonotif->username, $phone->phone, $message, $autonotif->api_key);
                    $this->save_send_notif($data, $autonotif, $phone, $message, $notif2->status);
                    $this->save_laporan_notif($data, $autonotif, $user, $notif2->status);
                }

                if ($phone->jenis == "semua") {
                    $notif3 =  $this->send_notif_wa($autonotif->username, $phone->phone, $message, $autonotif->api_key);
                    $this->save_send_notif($data, $autonotif, $phone, $message, $notif3->status);
                    $this->save_laporan_notif($data, $autonotif, $user, $notif3->status);
                }
            }
        }
    }

    public function send_notif_wa($username, $target, $message, $api_key)
    {

        // Kalau Sudah final hidupkan
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.autonotif.com/public/add_sm/?username=' . $username . '&api_key=' . $api_key,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('target' => $target, 'message' => $message, 'queue_on' => '2022-10-19 14:37:00'),
            CURLOPT_HTTPHEADER => array(
                'Cookie: PHPSESSID=776cc72ae1f16d6cddcda27957aa3a65'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response);

        return $data;
    }

    /*
    |----------------------------------------
    | END SETTING AUTO NOTIF
    |----------------------------------------
    */

    public function make_alertNotif($bank)
    {
        // Begin Add Alert User
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $log = new log_activity;
        $log->uid = $bank->uid;
        $log->activity = "login_gagal";
        $log->kategori = "alert";
        $log->status = "invisible";
        $log->date = $time;
        $log->deskripsi = 'Rekening ' . $bank->no_rekening . ' Gagal Login';
        $log->save();

        $user_data = User::all()->where('email', $bank->uid)->first();
        $admin_data = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'admin')->first();
        $message_gagal_scrap = autonotif::all()->where('otoritas', 'admin')->where('kategori', 'gagal_scrap')->first();

        if (
            $admin_data->status == "aktif" &&
            $message_gagal_scrap->status == "aktif" &&
            $user_data->notif_wa == "aktif"
        ) {
            $change_message = $this->notif_gagal_scrap($message_gagal_scrap->message, $bank);
            $this->send_notif_wa($admin_data->username, $user_data->no_hp, $change_message, $admin_data->api_key);
        }

        // End Add Alert User
    }

    public function notif_gagal_scrap($message, $data_bank)
    {
        $change1 = str_replace("(service)", $data_bank->service, $message);
        $change2 = str_replace("(no_rekening)", $data_bank->no_rekening, $change1);
        $change3 = str_replace("(nama_paket)", $data_bank->nama_paket, $change2);
        $change4 = str_replace("(harga)", $this->rupiah($data_bank->harga), $change3);
        $change5 = str_replace("(expired)", date("d-m-Y (H:i)", strtotime($data_bank->date_expired)), $change4);

        return $change5;
    }

    public function rupiah($rupiah)
    {
        $hasil_rupiah = number_format($rupiah, 0, ',', '.');
        return $hasil_rupiah;
    }

    public function make_alertRekening($uid, $no_rekening)
    {
        // Begin Add Alert User
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $log = new log_activity;
        $log->uid = $uid;
        $log->activity = "rekening_invalid";
        $log->kategori = "alert";
        $log->status = "invisible";
        $log->date = $time->toDateTimeString();
        $log->deskripsi = 'Rekening: ' . $no_rekening . ' Tidak Ditemukan';
        $log->save();
        // End Add Alert User
    }

    public function send_data($url, $data, $active)
    {
        if ($active == "aktif") {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',

                // ubah dengan data transaksi yang baru
                CURLOPT_POSTFIELDS => http_build_query(
                    array(
                        'response_code' => '0003',
                        'response_details' => 'Integrasi Data',
                        'bank' => $data->service,
                        'nomor_rekening' => $data->no_rekening,
                        'data' => array(
                            'tgl_transaksi' => $data->tgl_transaksi,
                            'tipe' => $data->tipe,
                            'nominal' => $data->nominal,
                            'deskripsi' => $data->deskripsi,
                        ),
                    )
                ),
            ));

            curl_exec($curl);
            curl_close($curl);
        }
    }

    public function save_send_notif($data, $autonotif, $phone, $message, $notif_status)
    {
        $new_track = new track_message;
        $new_track->uid = $data->uid;
        $new_track->api_key = $autonotif->api_key;
        $new_track->username = $autonotif->username;
        $new_track->phone = $phone->phone;
        $new_track->message = $message;
        // $new_track->status = $notif->status;
        $new_track->status = $notif_status;
        $new_track->save();
    }

    public function save_laporan_notif($data, $autonotif, $user, $notif_status)
    {
        $report = laporan_autonotif::all()->where('uid', $data->uid)->first();

        // begin send report notif to user
        if ($report->status == "aktif") {
            $change_report = $this->change_message_report($data, $report->message, $this->change_message_status($notif_status));
            $this->send_notif_wa($autonotif->username, $user->no_hp, $change_report, $autonotif->api_key);

            // Begin Save Data
            $new = new track_message;
            $new->uid = $data->uid;
            $new->api_key = $autonotif->api_key;
            $new->username = $autonotif->username;
            $new->phone = $user->no_hp;
            $new->message = $change_report;
            $new->status = $notif_status;
            $new->save();
            // end Save Data
        }
        //end send report notif to user
    }

    /*
    |----------------------------------------
    | BEGIN ERROR CODE
    |----------------------------------------
    */

    public function code_704($id)
    {
        $update = ListBank::all()->where('id', $id)->first();
        $update->status = "gagal";
        $update->save();
        $this->make_alertNotif($update);
    }

    public function code_705($id)
    {
        $update = ListBank::all()->where('id', $id)->first();
        $update->status = "wait_session";
        $update->save();
    }

    public function code_706($id)
    {
        $update = ListBank::all()->where('id', $id)->first();
        $update->status = "try_captcha";
        $update->save();
    }

    public function code_707($id)
    {
        $update = ListBank::all()->where('id', $id)->first();
        $update->status = "no_rekening";
        $update->save();
        // $this->make_alertRekening($update->uid, $update->no_rekening);
    }

    /*
    |----------------------------------------
    | END ERROR CODE
    |----------------------------------------
    */
}
