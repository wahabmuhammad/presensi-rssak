<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin.adminDashboard');
    }

    public function user(){
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $tahunIni = date("Y");
        $user = Auth::user()->nip;
        $userTable = User::orderBy('id', 'asc')->paginate(10);
        $presensimasukBulanini = DB::table('presensi')->whereMonth('tgl_presensi', $bulanIni)->where('nip', $user)->orderBy('tgl_presensi')->get();
        $presensipulangBulanini = DB::table('presensi_out')->whereMonth('tgl_presensi_out', $bulanIni)->where('nip', $user)->orderBy('tgl_presensi_out')->get();
        return view('admin.kepegawaian.user', compact('userTable'));
    }

    public function rekap(){
        $userTable = User::orderBy('id', 'asc')->paginate(10);
        return view('admin.rekapPresensi.presensiIn', compact('userTable'));
    }
}
