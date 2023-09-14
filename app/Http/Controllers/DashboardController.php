<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $today = date("Y-m-d");
        $bulanIni = date("m");
        $tahunIni = date("Y");
        $user = Auth::user()->nip;
        $PresensiMasuk = DB::table('presensi')->where('nip', $user)->where('tgl_presensi',$today)->first();
        $PresensiPulang = DB::table('presensi_out')->where('nip', $user)->where('tgl_presensi_out',$today)->first();
        $presensimasukBulanini = DB::table('presensi')->whereRaw('MONTH(tgl_presensi)= "' . $bulanIni . '"')->whereRaw('YEAR(tgl_presensi)="' . $tahunIni . '"')->orderBy('tgl_presensi')->get();
        $presensipulangBulanini = DB::table('presensi_out')->whereRaw('MONTH(tgl_presensi_out)= "' . $bulanIni . '"')->whereRaw('YEAR(tgl_presensi_out)="' . $tahunIni . '"')->orderBy('tgl_presensi_out')->get();

        return view('dashboard.dashboard', compact('PresensiMasuk','PresensiPulang', 'presensimasukBulanini','presensipulangBulanini' ));
    }
}
