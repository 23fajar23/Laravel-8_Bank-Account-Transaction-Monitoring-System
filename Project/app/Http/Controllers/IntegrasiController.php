<?php

namespace App\Http\Controllers;

use App\Models\integrasi;
use App\Models\ListBank;
use App\Models\log_activity;
use App\Models\transaksi;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class IntegrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {
            $data = integrasi::all()->where('email', Auth::user()->email)->first();
            return view('user.integrasi', compact('data'));
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
    public function show()
    {
        $data = integrasi::all()->where('email', Auth::user()->email)->first();
        return $data;
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
    public function update(Request $request)
    {
        $cek = "";
        $data = integrasi::all()->where('email', Auth::user()->email)->first();
        $cek = $data->status;
        $data->status = $request->status;
        $data->url = $request->url;

        if (Hash::check($request->password, Auth::user()->password)) {
            $data->save();

            // Make Log Data
            if ($cek == "tidak_aktif" && $request->status == "aktif") {

                $time = Carbon::now();
                $time->setTimezone('Asia/jakarta');
                $time->format('YYYY-MM-DD hh:mm:ss');

                $log = new log_activity;
                $log->uid = Auth::user()->email;
                $log->activity = "on_api";
                $log->kategori = "log";
                $log->status = "invisible";
                $log->date = $time->toDateTimeString();
                $log->deskripsi = 'API Key Telah diaktifkan';
                $log->save();
            } else if ($cek == "aktif" && $request->status == "tidak_aktif") {

                $time = Carbon::now();
                $time->setTimezone('Asia/jakarta');
                $time->format('YYYY-MM-DD hh:mm:ss');

                $log = new log_activity;
                $log->uid = Auth::user()->email;
                $log->activity = "off_api";
                $log->kategori = "log";
                $log->status = "invisible";
                $log->date = $time->toDateTimeString();
                $log->deskripsi = 'API Key Telah dinonaktifkan';
                $log->save();
            }
        } else {
            return "error";
        }
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

    public function alat_pengujian()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->otoritas == 'user' && Auth::user()->status == 'aktif') {
            return view('user.alat_pengujian');
        } else {
            return redirect()->route('home');
        }
    }

    public function callback_tester(Request $request)
    {
        $data = transaksi::all()->where('uid', Auth::user()->email)->where('service', $request->bank)->where('no_rekening', $request->no_rek);
        $bank = ListBank::all()->where('uid', Auth::user()->email)->where('service', $request->bank)->where('no_rekening', $request->no_rek);
        // Make Data

        $sort = 0;
        $array_output = [];
        foreach ($data as $toArray) {
            if ($sort >= 2) {
                # code...
            } else {
                $arr = array(
                    'tanggal_transaksi' => $toArray->tgl_transaksi,
                    'tipe' => $toArray->tipe,
                    'nominal' => $toArray->nominal,
                    'deskripsi' => $toArray->deskripsi,
                );
                $array_output[$sort] = $arr;
                $sort++;
            }
        }
        // End Make Data

        if (count($bank) == 0) {
            return Response()->json(
                array(
                    'error_code' => '0004',
                    'error_details' => 'Rekening Not Found',
                )
            );
        }

        if (count($data) == 0) {
            return Response()->json(
                array(
                    'error_code' => '0003',
                    'error_details' => 'No Transactions',
                )
            );
        }

        /*
        |----------------------------------------
        | BEGIN send data to url client
        |----------------------------------------
        */

        
        /*
            |----------------------------------------
            | END send data to url client
            |----------------------------------------
            */

        // Return in website interface
        return Response()->json(
            array(
                'response_code' => '0002',
                'response_details' => 'Mutasi Rekening',
                'bank' => $request->bank,
                'nomor_rekening' => $request->no_rek,
                'data' => $array_output
            )
        );
    }
}
