<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\presensiIn;
use App\Models\presensiOut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('admin.adminDashboard');
    }

    public function user(Request $request){
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $tahunIni = date("Y");
        $user = Auth::user()->nip;
        
        $presensimasukBulanini = DB::table('presensi')->whereMonth('tgl_presensi', $bulanIni)->where('nip', $user)->orderBy('tgl_presensi')->get();
        $presensipulangBulanini = DB::table('presensi_out')->whereMonth('tgl_presensi_out', $bulanIni)->where('nip', $user)->orderBy('tgl_presensi_out')->get();
        $keyword = $request->search;

        if(strlen($keyword)){
            $userTable = User::where('nip', 'like', "%$keyword%")
            ->orWhere('name', 'like', "%$keyword%")->paginate(10);
        }else{
            $userTable = User::orderBy('id', 'asc')->paginate(10);
        }
        // dd(request('search'));
        return view('admin.kepegawaian.user', compact('userTable'));
    }

    public function create_user(Request $request){
        $validasi = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|unique:users,nip',
            'password' => 'required|min:8',
            'email' => 'required|email|max:255|unique:users',
            'jabatan' => 'required|string|max:255',
            'role' => 'required'
        ]);
        //create to database
        $simpan = User::create($validasi);
        if($simpan){
            return back()->with('Berhasil Membuat User');
        }else{
            return back()->with('Gagal Membuat User');
        }
    }

    public function rekap(Request $request){
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $keyword = $request->search;

        if(strlen($keyword)){
            $rekapMasuk = presensiIn::where('nip', 'like', "%$keyword%")
            ->orWhere('name', 'like', "%$keyword%")->paginate(10);
        }else{
            $rekapMasuk = presensiIn::whereMonth('tgl_presensi', $bulanIni)->orderBy('tgl_presensi')->paginate('15');
        }
        return view('admin.rekapPresensi.presensiIn', compact('rekapMasuk'));
    }

    public function rekapOut(Request $request){
        // dd($request->date_start);
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $keyword = $request->search;

        if(strlen($keyword)){
            $rekapPulang = presensiOut::where('nip', 'like', "%$keyword%")
            ->orWhere('name', 'like', "%$keyword%")->paginate(10);
        }else{
            $rekapPulang = presensiOut::whereMonth('tgl_presensi_out', $bulanIni)->orderBy('tgl_presensi_out')->paginate('15');
        }
        return view('admin.rekapPresensi.presensiOut', compact('rekapPulang', 'today'));
    }
}
