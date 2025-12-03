<?php

namespace App\Http\Controllers;

use App\Models\presensiIn;
use App\Models\presensiOut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class historiPresensi_Controller extends Controller
{
    public function show(Request $request, $id)
    {
        $presensiIn = User::find($id);
        $today = date("Y-m-d");
        $bulanIni = date("n", strtotime($today));
        $dateStart = $request->date_start;
        $dateEnd = $request->date_to;

        if($dateStart && $dateEnd === null){
            $dataIn = DB::table('presensi')->whereMonth('tgl_presensi', $bulanIni)->Where('nip', $presensiIn->nip)->orderBy('tgl_presensi')->paginate(10);
            // $dataOut = DB::table('presensi_out')->whereMonth('tgl_presensi_out', $bulanIni)->where('nip', $presensiIn->nip)->orderBy('tgl_presensi_out')->paginate(10);
        }else{
            $dataIn = presensiIn::whereBetween('tgl_presensi', [$dateStart, $dateEnd])->where('nip', $presensiIn->nip)->paginate(10);
            // $dataOut = presensiOut::whereBetween('tgl_presensi_out', [$dateStart, $dateEnd])->where('nip', $presensiIn->nip)->paginate(10);
        }
        // dd($dataOut);
        return view('absensi.histori', compact('dataIn', 'presensiIn'));
    }
}
