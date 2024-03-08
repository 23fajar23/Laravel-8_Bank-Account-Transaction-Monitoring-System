<?php

namespace App\Http\Controllers;

use App\Models\autonotif;
use App\Models\list_packet;
use App\Models\ListBank;
use App\Models\referal_bank_packet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Block\ListData;

class PacketController extends Controller
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

            $data = ListBank::all();

            $bca = 0;
            $bri = 0;
            $bni = 0;
            $mandiri = 0;

            $bca_persen = 0;
            $bri_persen = 0;
            $bni_persen = 0;
            $mandiri_persen = 0;

            foreach ($data as $key) {
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
                $bca_persen = ($bca * 100) / count($data);
            }

            if ($bri == 0) {
                $bri_persen = 0;
            } else {
                $bri_persen = ($bri * 100) / count($data);
            }

            if ($bni == 0) {
                $bni_persen = 0;
            } else {
                $bni_persen = ($bni * 100) / count($data);
            }

            if ($mandiri == 0) {
                $mandiri_persen = 0;
            } else {
                $mandiri_persen = ($mandiri * 100) / count($data);
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

            return view('admin.data_packet', compact('output'));
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->jenis != "harian" && $request->jenis != "normal") {
            return "null_jenis";
        }

        if ($request->status != "tidak_aktif" && $request->status != "aktif") {
            return "null_status";
        }

        if ($request->bank == NULL) {
            return "null_bank";
        }

        if ($request->nama == NULL) {
            return "null_nama";
        }

        if ($request->harga == NULL) {
            return "null_harga";
        }

        $durasi = 1;

        if ($request->jenis == "harian") {
            # code...
        } else {
            if ($request->masa_aktif < 1) {
                return "null_durasi";
            }

            $durasi = $request->masa_aktif;
        }

        $paket = new list_packet;
        $paket->nama_paket = $request->nama;
        $paket->harga = $request->harga;
        $paket->durasi = $durasi;
        $paket->jenis = $request->jenis;
        $paket->status = $request->status;
        $paket->save();

        foreach ($request->bank as $key) {
            $referal = new referal_bank_packet;
            $referal->referal_id = $paket->id;
            $referal->service = $this->caps_bank($key);
            $referal->save();
        }

        return "berhasil";
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
        if ($request->jenis != "harian" && $request->jenis != "normal") {
            return "null_jenis";
        }

        if ($request->status != "tidak_aktif" && $request->status != "aktif") {
            return "null_status";
        }

        if ($request->bank == NULL) {
            return "null_bank";
        }

        if ($request->nama == NULL) {
            return "null_nama";
        }

        if ($request->harga == NULL) {
            return "null_harga";
        }

        $durasi = 1;

        if ($request->jenis == "harian") {
            # code...
        } else {
            if ($request->masa_aktif < 1) {
                return "null_durasi";
            }

            $durasi = $request->masa_aktif;
        }

        $paket = list_packet::all()->where('id', $request->id)->first();
        $paket->nama_paket = $request->nama;
        $paket->harga = $request->harga;
        $paket->jenis = $request->jenis;
        $paket->durasi = $durasi;

        // --------------------
        // Begin Data Autonotif
        // --------------------

        if ($paket->status == "aktif" && $request->status == "tidak_aktif") {

            $autonotif_login = autonotif::all()
                ->where('otoritas', 'admin')
                ->where('kategori', 'admin')
                ->first();

            $autonotif_harian_delete = autonotif::all()
                ->where('otoritas', 'admin')
                ->where('kategori', 'paket_harian_delete')
                ->first();

            $list_bank = ListBank::all()
                ->where('referal_paket_id', $paket->id);

            foreach ($list_bank as $key) {

                $bank = ListBank::all()
                    ->where('id', $key->id)
                    ->first();

                $autonotif_user = User::all()
                    ->where('email', $bank->uid)
                    ->first();

                if (
                    $autonotif_login->status == "aktif" &&
                    $autonotif_harian_delete->status == "aktif" &&
                    $autonotif_user->status == "aktif"
                ) {
                    $message_delete = $this->message_packet($autonotif_harian_delete->message, $paket);
                    $this->send_notif_wa($autonotif_login->username, $autonotif_user->no_hp, $message_delete, $autonotif_login->api_key);
                }

                $bank->nama_paket = "-";
                $bank->harga = "-";
                // $bank->jenis = "-";
                $bank->referal_paket_id = "-";
                $bank->status = "stop";
                $bank->save();
            }
        }

        // --------------------
        // End Data Autonotif
        // --------------------

        $paket->status = $request->status;
        $paket->save();

        $bank = referal_bank_packet::all()->where('referal_id', $paket->id);
        $data_bank = [];
        $count = 0;

        foreach ($bank as $key) {
            $referal = new referal_bank_packet;
            $referal->id = $key->id;
            $referal->referal_id = $key->referal_id;
            $referal->service = $key->service;
            $data_bank[$count] = $referal;
            $count++;
        }

        if (count($bank) == count($request->bank)) {
            $cek = 0;
            foreach ($data_bank as $key) {
                if ($request->service == $key->service) {
                } else {
                    $update = referal_bank_packet::all()->where('id', $data_bank[$cek]->id)->first();
                    $update->service = $this->caps_bank($request->bank[$cek]);
                    $update->save();
                }
                $cek++;
            }
        } else if (count($bank) > count($request->bank)) {
            for ($i = 0; $i < count($request->bank); $i++) {
                $update = referal_bank_packet::all()->where('id', $data_bank[$i]->id)->first();
                $update->service = $this->caps_bank($request->bank[$i]);
                $update->save();
            }

            for ($i = count($request->bank); $i < count($bank); $i++) {
                $update = referal_bank_packet::all()->where('id', $data_bank[$i]->id)->first();
                $update->delete();
            }
        } else if (count($bank) < count($request->bank)) {
            for ($i = 0; $i < count($bank); $i++) {
                $update = referal_bank_packet::all()->where('id', $data_bank[$i]->id)->first();
                $update->service = $this->caps_bank($request->bank[$i]);
                $update->save();
            }

            for ($i = count($bank); $i < count($request->bank); $i++) {
                $baru = new referal_bank_packet;
                $baru->referal_id = $paket->id;
                $baru->service = $this->caps_bank($request->bank[$i]);
                $baru->save();
            }
        }

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

    public function src_packet(Request $request)
    {
        $data = list_packet::all()->where('id', $request->id)->first();
        $service = referal_bank_packet::all()->where('referal_id', $data->id);
        $bank = [];

        $cek = 0;
        foreach ($service as $key) {
            $new = new referal_bank_packet;
            $new->referal_id = $key->referal_id;
            $new->service = $key->service;
            $bank[$cek] = $new;
            $cek++;
        }

        return array(
            'data' => $data,
            'bank' => $bank
        );
    }

    public function del_packet(Request $request)
    {
        $packet = list_packet::all()
            ->where('id', $request->id)
            ->first();

        $service = referal_bank_packet::all()
            ->where('referal_id', $packet->id);

        // Data Autonotif
        $autonotif_login = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'admin')
            ->first();

        $autonotif_harian_delete = autonotif::all()
            ->where('otoritas', 'admin')
            ->where('kategori', 'paket_harian_delete')
            ->first();

        if ($packet->jenis == "harian") {
            $list_bank = ListBank::all()
                ->where('referal_paket_id', $packet->id);

            foreach ($list_bank as $key) {


                $bank = ListBank::all()
                    ->where('id', $key->id)
                    ->first();

                $autonotif_user = User::all()
                    ->where('email', $bank->uid)
                    ->first();

                // Tambahkan autonotif layanan telah tidak tersedia.
                if (
                    $autonotif_login->status == "aktif" &&
                    $autonotif_harian_delete->status == "aktif" &&
                    $autonotif_user->status == "aktif"
                ) {
                    $message_delete = $this->message_packet($autonotif_harian_delete->message, $packet);
                    $this->send_notif_wa($autonotif_login->username, $autonotif_user->no_hp, $message_delete, $autonotif_login->api_key);
                }

                $bank->nama_paket = "-";
                $bank->harga = "-";
                // $bank->jenis = "-";
                $bank->referal_paket_id = "-";
                $bank->status = "stop";
                $bank->save();
            }
        }

        foreach ($service as $key) {
            $key->delete();
        }
        $packet->delete();
    }

    public function ajax_packet_datatables()
    {
        $array = [];
        $cek = 0;
        $data = list_packet::orderBy('id', 'DESC')->get();

        foreach ($data as $key) {
            $output = new list_packet;
            $output->id = $key->id;
            $output->no = $cek + 1;
            $output->nama_paket = $key->nama_paket;
            $output->harga = "Rp " . $key->harga;
            $output->durasi = $key->durasi . " Hari";
            $output->status = $this->change($key->status);
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addColumn('action', 'admin.action.paket-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
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

    public function caps_bank($value)
    {
        if ($value == "bca") {
            return "BCA";
        } else if ($value == "bri") {
            return "BRI";
        } else if ($value == "bni") {
            return "BNI";
        } else if ($value == "mandiri") {
            return "MANDIRI";
        }
    }

    public function rupiah($rupiah)
    {
        $hasil_rupiah = number_format($rupiah, 0, ',', '.');
        return $hasil_rupiah;
    }

    public function message_packet($message, $data_packet)
    {
        $change1 = str_replace("(nama_paket)", $data_packet->nama_paket, $message);
        $change2 = str_replace("(harga)", $this->rupiah($data_packet->harga), $change1);
        return $change2;
    }

    public function send_notif_wa($username, $target, $message, $api_key)
    {
        $data = null;
        return $data;
    }
}
