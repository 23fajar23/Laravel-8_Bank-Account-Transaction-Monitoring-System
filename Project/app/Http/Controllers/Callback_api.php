<?php

namespace App\Http\Controllers;

use App\Models\integrasi;
use App\Models\ListBank;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isEmpty;

class Callback_api extends Controller
{

    public function validasi_key_signature($api_key, $api_signature)
    {
        $cek = integrasi::all();
        $out = "";
        foreach ($cek as $account) {
            if (Hash::check($api_key, $account->api_key) && Hash::check($api_signature, $account->api_signature)) {
                $out = "active";
                if ($account->status == "tidak_aktif") {
                    $out = "tidak_aktif";
                }
            }
        }
        if ($api_key == null || $api_signature == null) {
            return "null";
        } else {
            if ($out == "") {
                return "failed";
            } else if ($out == "tidak_aktif") {
                return "tidak_aktif";
            } else {
                return "success";
            }
        }
    }

    public function return_failed()
    {
        return Response()->json(
            array(
                'error_code' => '0001',
                'error_details' => 'Invalid API Key & Signature'
            )
        );
    }

    public function return_off()
    {
        return Response()->json(
            array(
                'error_code' => '0002',
                'error_details' => 'API Key & Signature Not Active'
            )
        );
    }

    public function return_null()
    {
        return Response()->json(
            array(
                'error_code' => '0003',
                'error_details' => 'API Key & Signature not found'
            )
        );
    }

    public function return_rekening_not_find()
    {
        return Response()->json(
            array(
                'error_code' => '0004',
                'error_details' => 'Rekening Not Found'
            )
        );
    }

    public function search_data($api_key, $api_signature)
    {
        $data = integrasi::all();
        $output = [];
        foreach ($data as $account) {
            if (Hash::check($api_key, $account->api_key) && Hash::check($api_signature, $account->api_signature)) {
                $output = $account;
            }
        }
        return $output;
    }

    public function user_cek_data_rekening(Request $request)
    {
        if ($this->validasi_key_signature($request->api_key, $request->api_signature) == "success") {

            /*
            |----------------------------------------
            | BEGIN validation & search bank data
            |----------------------------------------
            */

            $data_api = $this->search_data($request->api_key, $request->api_signature);
            $data = ListBank::all()
                ->where('uid', $data_api->email);
            if ($request->rekening != null) {
                $data = ListBank::all()
                    ->where('uid', $data_api->email)
                    ->where('no_rekening', $request->rekening);
            }

            if ($data->isEmpty()) {
                return $this->return_rekening_not_find();
            }

            $fullname = "";
            $user = User::all()
                ->where('email', $data_api->email)
                ->first();
            $fullname = $user->fullname;

            /*
            |----------------------------------------
            | END validation & search bank data
            |----------------------------------------
            */

            /*
            |----------------------------------------
            | BEGIN make array for mutasi data
            |----------------------------------------
            */

            $sort = 0;
            $array_output = [];
            foreach ($data as $toArray) {
                $arr = array(
                    'id' => $sort + 1,
                    'bank' => $toArray->service,
                    'username_ibank' => $toArray->username_ibank,
                    'nomor_rekening' => $toArray->no_rekening,
                    'create_at' => $toArray->date,
                );
                $array_output[$sort] = $arr;
                $sort++;
            }

            /*
            |----------------------------------------
            | END make array for mutasi data
            |----------------------------------------
            */

            /*
            |----------------------------------------
            | BEGIN send return json
            |----------------------------------------
            */

            return Response()->json(
                array(
                    'response_code' => '0001',
                    'response_details' => 'Daftar Rekening',
                    'user_account' => $fullname,
                    'api_key' => $request->api_key,
                    'api_signature' => $request->api_signature,
                    'created_at' => date($user->created_at),
                    'updated_at' => date($user->updated_at),
                    'data' => $array_output
                )
            );

            /*
            |----------------------------------------
            | END send return json
            |----------------------------------------
            */
        } else if ($this->validasi_key_signature($request->api_key, $request->api_signature) == "failed") {
            return $this->return_failed();
        } else if ($this->validasi_key_signature($request->api_key, $request->api_signature) == "tidak_aktif") {
            return $this->return_off();
        } else {
            return $this->return_null();
        }
    }


    public function cek_mutasi(Request $request)
    {
        if ($this->validasi_key_signature($request->api_key, $request->api_signature) == "success") {

            /*
            |----------------------------------------
            | BEGIN validation & search bank data
            |----------------------------------------
            */
            $data_api = $this->search_data($request->api_key, $request->api_signature);
            $data = ListBank::all()
                ->where('uid', $data_api->email);
            if ($request->rekening != null) {
                $data = ListBank::all()
                    ->where('uid', $data_api->email)
                    ->where('no_rekening', $request->rekening);
            }

            if ($data->isEmpty()) {
                return $this->return_rekening_not_find();
            }

            $fullname = "";
            $user = User::all()
                ->where('email', $data_api->email)
                ->first();
            $fullname = $user->fullname;

            /*
            |----------------------------------------
            | END validation & search bank data
            |----------------------------------------
            */

            /*
            |----------------------------------------
            | BEGIN make array for mutasi data
            |----------------------------------------
            */
            $sort = 0;
            $array_bank = [];
            foreach ($data as $bank) {
                $array_transaksi = [];
                $data_transaksi = transaksi::all()
                    ->where('uid', $data_api->email)
                    ->where('no_rekening', $bank->no_rekening);

                /*
                |----------------------------------------
                | BEGIN date range mutasi
                |----------------------------------------
                */
                if ($request->tgl_awal == null && $request->tgl_akhir != null) {
                    $data_transaksi = transaksi::all()
                        ->where('uid', $data_api->email)
                        ->where('no_rekening', $bank->no_rekening)
                        ->where('tgl_transaksi', '<=', $request->tgl_akhir);
                } else if ($request->tgl_awal != null && $request->tgl_akhir == null) {
                    $data_transaksi = transaksi::all()
                        ->where('uid', $data_api->email)
                        ->where('no_rekening', $bank->no_rekening)
                        ->where('tgl_transaksi', '>=', $request->tgl_awal);
                } else if ($request->tgl_awal != null && $request->tgl_akhir != null) {
                    $data_transaksi = transaksi::all()
                        ->where('uid', $data_api->email)
                        ->where('no_rekening', $bank->no_rekening)
                        ->where('tgl_transaksi', '>=', $request->tgl_awal)
                        ->where('tgl_transaksi', '<=', $request->tgl_akhir);
                }
                /*
                |----------------------------------------
                | END date range mutasi
                |----------------------------------------
                */

                $cek = 0;
                foreach ($data_transaksi as $transaksi) {
                    $array_transaksi[$cek] = array(
                        'jenis_transaksi' => $transaksi->tipe,
                        'tgl_transaksi' => $transaksi->tgl_transaksi,
                        'nominal' => $transaksi->nominal,
                        'deskripsi' => $transaksi->deskripsi,
                    );
                    $cek++;
                }
                $array_bank[$sort] = array(
                    'nomor_rekening' => $bank->no_rekening,
                    'bank' => $bank->service,
                    'username_ibank' => $bank->username_ibank,
                    'mutasi' => $array_transaksi
                );
                $sort++;
            }

            /*
            |----------------------------------------
            | END make array for mutasi data
            |----------------------------------------
            */

            /*
            |----------------------------------------
            | BEGIN send return json
            |----------------------------------------
            */
            return Response()->json(
                array(
                    'response_code' => '0002',
                    'response_details' => 'Mutasi Rekening',
                    'user_account' => $fullname,
                    'api_key' => $request->api_key,
                    'api_signature' => $request->api_signature,
                    'created_at' => date($user->created_at),
                    'updated_at' => date($user->updated_at),
                    'data' => $array_bank
                )
            );

            /*
            |----------------------------------------
            | END send return json
            |----------------------------------------
            */
        } else if ($this->validasi_key_signature($request->api_key, $request->api_signature) == "failed") {
            return $this->return_failed();
        } else if ($this->validasi_key_signature($request->api_key, $request->api_signature) == "tidak_aktif") {
            return $this->return_off();
        } else {
            return $this->return_null();
        }
    }
}
