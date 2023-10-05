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
        $bulanIni = date("m", strtotime($today));
        $tahunIni = date("Y");
        $user = Auth::user()->nip;
        $PresensiMasuk = DB::table('presensi')->where('nip', $user)->where('tgl_presensi',$today)->first();
        $PresensiPulang = DB::table('presensi_out')->where('nip', $user)->where('tgl_presensi_out',$today)->first();
        $presensimasukBulanini = DB::table('presensi')->whereMonth('tgl_presensi', $bulanIni)->where('nip', $user)->orderBy('tgl_presensi')->get();
        $presensipulangBulanini = DB::table('presensi_out')->whereMonth('tgl_presensi_out', $bulanIni)->where('nip', $user)->orderBy('tgl_presensi_out')->get();
        $leaderboard = DB::table('presensi')->join('users', 'presensi.nip', '=' , 'users.nip')->where('tgl_presensi', $today)->orderBy('jam_in')->get();

        // dd($bulanIni);
        return view('dashboard.dashboard', compact('PresensiMasuk','PresensiPulang', 'presensimasukBulanini','presensipulangBulanini','leaderboard' ));
    }
}
