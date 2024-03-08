<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\log_activity;
use App\Models\testimoni;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.data_event");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view("admin.add_event");
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
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
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
    public function destroy(Request $request)
    {
    }


    public function delete_testimonial(Request $request)
    {
        $delete = testimoni::all()->where('id', $request->id)->first();
        $delete->delete();
    }

    public function cari_testimonial(Request $request)
    {
        $data = testimoni::all()->where('id', $request->id)->first();
        return $data;
    }

    public function save_event(Request $request)
    {

        $time = Carbon::now();
        $time->setTimezone('Asia/jakarta');
        $time->format('YYYY-MM-DD hh:mm:ss');

        $pengumuman = new announcement;
        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->date = $time;
        $pengumuman->status = $request->status;
        $pengumuman->save();

        $baru = new log_activity;
        $baru->uid = Auth::user()->email;
        $baru->activity = "event";
        $baru->kategori = "event";
        $baru->status = $request->notif_user;
        $baru->deskripsi = $request->judul;
        $baru->referal = $pengumuman->id;
        $baru->date = $time;
        $baru->save();
    }

    public function delete_event(Request $request)
    {
        $pengumuman = announcement::all()->where('id', $request->id)->first();
        $pengumuman->delete();
        $data = log_activity::all()->where('referal', $request->id)->first();
        $data->delete();
    }

    public function save_ubah_event(Request $request)
    {
        $pengumuman = announcement::all()->where('id', $request->id)->first();
        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->status = $request->status;
        $pengumuman->save();

        $log = log_activity::all()->where('referal', $request->id)->first();
        $log->status = $request->notif_user;
        $log->deskripsi = $request->judul;
        $log->save();
    }

    public function change($value)
    {
        if ($value == "tidak_aktif") {
            return "Tidak Aktif";
        } else if ($value == "aktif") {
            return "Aktif";
        }
    }

    public function ajax_event_datatables()
    {
        $array = [];
        $cek = 0;
        $data = announcement::orderBy('id', 'DESC')->get();

        foreach ($data as $key) {
            $log = log_activity::all()->where('referal', $key->id)->first();
            $output = new announcement;
            $output->id = $key->id;
            $output->notif_user = $this->change($log->status);
            $output->no = $cek + 1;
            $output->judul = $key->judul;
            $output->deskripsi = $key->deskripsi;
            $output->date = date('d-M-Y', strtotime($key->date));
            $output->status = $this->change($key->status);
            $array[$cek] = $output;
            $cek++;
        }

        if (request()->ajax()) {
            return datatables()->of($array)
                ->addColumn('action', 'admin.action.event-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
