<?php

namespace App\Http\Controllers;

use App\Models\autonotif;
use App\Models\laporan_autonotif;
use App\Models\log_activity;
use App\Models\phone_autonotif;
use App\Models\track_message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotifController extends Controller
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

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {
            $output = [];
            $message_success = track_message::all()
                ->where('uid', Auth::User()->email)
                ->where('status', "success");
            $message_failed = track_message::all()
                ->where('uid', Auth::User()->email)
                ->where('status', "Unauthorized");
            $total = count($message_success) + count($message_failed);
            $output[0] = count($message_success);
            $output[1] = count($message_failed);
            if ($output[1] == 0 && $output[0] == 0) {
                $output[2] = 0;
                $output[3] = 0;
            } else {
                $output[2] = ($output[0] * 100) / $total;
                $output[3] = ($output[1] * 100) / $total;
            }
            return view('user.riwayat_autonotif', compact('output'));
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
        //
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
    public function edit($id)
    {
        //
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

    public function get_log()
    {
        $output = [];

        // log
        $data = log_activity::orderBy('id', 'DESC')
            ->where('uid', Auth::user()->email)
            ->where('kategori', 'log')
            ->get();
        foreach ($data as $hasil) {
            $hasil->date = date('d-M-Y (H:i)', strtotime($hasil->date));
        }

        // Event
        $event = log_activity::orderBy('id', 'DESC')->where('kategori', 'event')->where('status', 'aktif')->get();
        foreach ($event as $hasil) {
            $hasil->date = date('d-M-Y (H:i)', strtotime($hasil->date));
        }

        // Alert
        $alert = log_activity::orderBy('id', 'DESC')
            ->where('uid', Auth::user()->email)
            ->where('kategori', "alert")
            ->get();
        foreach ($alert as $hasil) {
            $hasil->date = date('d-M-Y (H:i)', strtotime($hasil->date));
        }

        // Input Data
        $output[0] = $data;
        $output[1] = $event;
        $output[2] = $alert;

        // Jumlah
        $output[3] = count($data);
        $output[4] = count($event);
        $output[5] = count($alert);

        // Jumlah invisible
        $output[6] = count($data->where('status', 'invisible'));
        $output[7] = count($event);
        $output[8] = count($alert->where('status', 'invisible'));

        // Total
        $output[9] = $output[6] + $output[7] + $output[8];


        return $output;
    }

    public function log_visible()
    {
        $data = log_activity::all()
            ->where('uid', Auth::user()->email)
            ->where('kategori', 'log')
            ->where('status', 'invisible');
        foreach ($data as $hasil) {
            $baru = log_activity::all()->where('id', $hasil->id)->first();
            $baru->status = "visible";
            $baru->save();
        }
    }

    public function alert_visible()
    {
        $data = log_activity::all()
            ->where('uid', Auth::user()->email)
            ->where('kategori', 'alert')
            ->where('status', 'invisible');
        foreach ($data as $hasil) {
            $baru = log_activity::all()->where('id', $hasil->id)->first();
            $baru->status = "visible";
            $baru->save();
        }
    }

    public function save_key_autonotif(Request $request)
    {
        $data = $this->send_notif_wa($request->username, 62123456789, "Connect Mutasi", $request->api_key);
        if ($data->status == "success") {
            $data = autonotif::all()->where('uid', Auth::User()->email)->first();
            $data->api_key = $request->api_key;
            $data->status = $request->status;
            $data->username = $request->username;
            $data->save();
            return "success";
        } else {
            return "failed";
        }
    }

    public function send_notif_wa($username, $target, $message, $api_key)
    {
        $data = null;
        return $data;
    }


    public function save_message_autonotif(Request $request)
    {
        if (Auth::User()->otoritas == "user") {
            $data = autonotif::all()->where('uid', Auth::User()->email)->first();
            $data->message = $request->message;
            $data->save();
        } else if (Auth::User()->otoritas == "admin") {
            $data = autonotif::all()->where('uid', $request->uid)->first();
            $data->message = $request->message;
            $data->save();
        }
    }

    public function save_message_report_self(Request $request)
    {
        if (Auth::User()->otoritas == "user") {
            $data = laporan_autonotif::all()->where('uid', Auth::User()->email)->first();
            $data->message = $request->message;
            $data->status = $request->status;
            $data->save();
        } else if (Auth::User()->otoritas == "admin") {
            $data = laporan_autonotif::all()->where('uid', $request->uid)->first();
            $data->message = $request->message;
            $data->status = $request->status;
            $data->save();
        }
    }

    public function save_phone_autonotif(Request $request)
    {
        $data = autonotif::all()->where('uid', Auth::User()->email)->first();
        $phone = phone_autonotif::all()->where('uid', $data->uid)->where('referal_autonotif', $data->id);

        $phone_data = [];
        $cek_source = 0;
        foreach ($phone as $key) {
            $baru = new phone_autonotif;
            $baru->id = $key->id;
            $baru->uid = $key->uid;
            $baru->referal_autonotif = $key->referal_autonotif;
            $baru->phone = $key->phone;
            $baru->jenis = $key->jenis;
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
                $baru->uid = Auth::User()->email;
                $baru->referal_autonotif = $data->id;
                $baru->jenis = $request->jenis[$i];
                $baru->phone = $this->change_no_hp($request->penerima[$i]);
                $baru->save();
            }
        }
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

    public function change_status($data)
    {
        if ($data == "aktif") {
            return "Aktif";
        } else if ($data == "tidak_aktif") {
            return "Tidak Aktif";
        }
    }

    public function change_message_status($data)
    {
        if ($data == "success") {
            return "Berhasil";
        } else if ($data == "Unauthorized") {
            return "Gagal";
        }
    }

    public function search_message(Request $request)
    {
        $data = track_message::all()->where('id', $request->id)->first();
        $data->date = date('d M Y (H:i)', strtotime($data->created_at));
        return $data;
    }

    public function ajax_track_message()
    {
        $array = [];
        $cek = 0;
        $data = track_message::orderBy('id', 'DESC')->where('uid', Auth::User()->email)->get();
        foreach ($data as $key) {
            $output = new track_message;
            $output->no = $cek + 1;
            $output->id = $key->id;
            $output->uid = $key->uid;
            $output->api_key = $key->api_key;
            $output->username = $key->username;
            $output->phone = $key->phone;
            $output->message = $key->message;
            $output->date = date('d M Y (H:i)', strtotime($key->created_at));
            $output->status = $this->change_message_status($key->status);
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addColumn('status', 'user.action.autonotif_btn_status')
                ->addColumn('action', 'user.action.autonotif-action')
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
