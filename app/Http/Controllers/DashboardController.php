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
        $user = Auth::user()->nip;
        $todayPresensi = DB::table('presensi')->where('nip', $user)->where('tgl_presensi',$today)->first();
        return view('dashboard.dashboard', compact('todayPresensi'));
    }
}
