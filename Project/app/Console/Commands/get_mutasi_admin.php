<?php

namespace App\Console\Commands;

use App\Models\bank_deposit;
use App\Models\mutasi_bank_deposit;
use Carbon\Carbon;
use Illuminate\Console\Command;

class get_mutasi_admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mutasi_admin';

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

        $rekening = bank_deposit::all()
            ->where('status', 'aktif');

        foreach ($rekening as $bank) {

            if ($bank->mutasi == "gagal" || $bank->mutasi == "baru") {
            } else {

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


                if ($bank->service == "BCA") {
                    $data_bca = $this->take_data_bank(
                        $url_token_bca,
                        $bank->username_ibank,
                        $bank->password_ibank,
                        $bank->no_rekening,
                        $url_mutasi_bca
                    );

                    $this->save_transaksi_admin($data_bca, $bank);
                } else if ($bank->service == "BRI") {
                    $data_bri = $this->take_data_bank(
                        $url_token_bri,
                        $bank->username_ibank,
                        $bank->password_ibank,
                        $bank->no_rekening,
                        $url_mutasi_bri
                    );

                    $this->save_transaksi_admin($data_bri, $bank);
                } else if ($bank->service == "BNI") {
                    $data_bni = $this->take_data_bank(
                        $url_token_bni,
                        $bank->username_ibank,
                        $bank->password_ibank,
                        $bank->no_rekening,
                        $url_mutasi_bni
                    );

                    $this->save_transaksi_admin($data_bni, $bank);
                } else if ($bank->service == "MANDIRI") {
                    $data_mandiri = $this->take_data_bank_mib(
                        $url_token_mib,
                        $bank->company_id,
                        $bank->username_ibank,
                        $bank->password_ibank,
                        $bank->no_rekening,
                        $url_mutasi_mib
                    );

                    $this->save_transaksi_admin($data_mandiri, $bank);
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

    public function save_transaksi_admin($data, $bank)
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
            $update = bank_deposit::all()->where('id', $bank->id)->first();
            $update->mutasi = "berhasil";
            $update->save();
            // End Change Status

            $cek_transaksi = mutasi_bank_deposit::all()
                ->where('service', $bank->service)
                ->where('no_rekening', $bank->no_rekening);

            if ($bank->service == "BCA") {
                foreach ($data->data->response as $key) {
                    $bca_transaksi = new mutasi_bank_deposit;
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
                    }
                }
            }

            if ($bank->service == "BRI") {
                foreach ($data->data->response as $key) {
                    $bri_transaksi = new mutasi_bank_deposit;
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
                    }
                }
            }

            if ($bank->service == "BNI") {
                foreach ($data->data->response as $key) {
                    $bni_transaksi = new mutasi_bank_deposit;
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
                    }
                }
            }

            if ($bank->service == "MANDIRI") {
                foreach ($data->data->response as $key) {
                    $mandiri_transaksi = new mutasi_bank_deposit;
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
                    }
                }
            }
        }
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
    | BEGIN ERROR CODE
    |----------------------------------------
    */

    public function code_704($id)
    {
        $update = bank_deposit::all()->where('id', $id)->first();
        $update->status = "tidak_aktif";
        $update->mutasi = "gagal";
        $update->save();
    }

    public function code_705($id)
    {
        $update = bank_deposit::all()->where('id', $id)->first();
        $update->mutasi = "wait_session";
        $update->save();
    }

    public function code_706($id)
    {
        $update = bank_deposit::all()->where('id', $id)->first();
        $update->mutasi = "try_captcha";
        $update->save();
    }

    public function code_707($id)
    {
        $update = bank_deposit::all()->where('id', $id)->first();
        $update->mutasi = "no_rekening";
        $update->save();
    }

    /*
    |----------------------------------------
    | END ERROR CODE
    |----------------------------------------
    */
}
