<?php

namespace App\Console\Commands;

use App\Models\autonotif;
use App\Models\deposit;
use App\Models\mutasi_bank_deposit;
use App\Models\otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class validate_payment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'top_up';

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
    public function handle()
    {
        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $invoice = deposit::all()
            ->where('status', 'wait');

        $autonotif_login = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'admin')
            ->first();

        $autonotif_payment_success = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'payment_success')
            ->first();

        $autonotif_payment_failed = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'payment_failed')
            ->first();

        foreach ($invoice as $key) {
            $expired = strtotime($key->expired);
            $date_now = strtotime($time);
            $cek_expired = $expired - $date_now;

            $user = User::all()
                ->where('email', $key->uid)
                ->first();

            if ($cek_expired <= 0) {
                $key->status = "expired";
                $key->save();

                if (
                    $autonotif_login->status == "aktif" &&
                    $autonotif_payment_failed->status == "aktif" &&
                    $user->notif_wa == "aktif"
                ) {
                    $message_expired = $this->change_message($key, $autonotif_payment_failed->message);
                    $this->send_notif_wa($autonotif_login->username, $user->no_hp, $message_expired, $autonotif_login->api_key);
                }
            }

            if ($key->status != "expired") {
                $data_mutasi = mutasi_bank_deposit::all()
                    ->where('service', $key->service)
                    ->where('tipe', 'KREDIT')
                    ->where('no_rekening', $key->no_rekening);

                foreach ($data_mutasi as $mutasi) {
                    if ($key->tagihan == $mutasi->nominal) {

                        // -----------------
                        // Begin Check Date
                        // -----------------

                        $date_start = date("Y-m-d", strtotime($key->date));
                        $date_end = date("Y-m-d", strtotime($key->expired));
                        $date_data = date("Y-m-d", strtotime($mutasi->tgl_transaksi));

                        $diferent_start = strtotime($date_start);
                        $diferent_end = strtotime($date_end);
                        $diferent_data = strtotime($date_data);

                        // -----------------
                        // End Check Date
                        // -----------------

                        if (
                            $diferent_data >= $diferent_start &&
                            $diferent_data <= $diferent_end
                        ) {
                            $key->status = "berhasil";
                            $key->save();

                            $user->saldo = $user->saldo + $key->nominal;
                            $user->save();

                            if (
                                $autonotif_login->status == "aktif" &&
                                $autonotif_payment_success->status == "aktif" &&
                                $user->notif_wa == "aktif"
                            ) {
                                $message_success = $this->change_message($key, $autonotif_payment_success->message);
                                $this->send_notif_wa($autonotif_login->username, $user->no_hp, $message_success, $autonotif_login->api_key);
                            }
                        }
                    }
                }
            }
        }
    }

    public function change_message($data, $message)
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

    public function rupiah($rupiah)
    {
        $hasil_rupiah = number_format($rupiah, 0, ',', '.');
        return $hasil_rupiah;
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
}
