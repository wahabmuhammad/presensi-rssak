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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportMasuk;
use App\Exports\ExportPulang;
use GrahamCampbell\ResultType\Success;

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

    public function edit($id){
        $user = User::find($id);
        // dd($user->name);
        return view('admin.kepegawaian.editUser', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|max:255',
            'jabatan' => 'required|string|max:255',
            'role' => 'required'
        ]);

        $user = User::find($id);
        // $user = User::all();
        // dd($user);
        $user->update($request->all());
        notify()->success('Berhasil Update data');
        return redirect(route('kepegawaianUser'))->with('success', 'Update Data berhasil');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect(route('kepegawaianUser'))->with('success','Berhasil Menghapus User');
    }

    public function rekap(Request $request){
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $keyword = $request->search;
        $start_to = $request->date_start;
        $end_to = $request->date_to;

        if(strlen($keyword)){
            $rekapMasuk = presensiIn::where('nip', 'like', "%$keyword%")
            ->orWhere('name', 'like', "%$keyword%")->paginate(10);
        }elseif($start_to){
            $rekapMasuk = presensiIn::whereBetween('tgl_presensi', [$start_to, $end_to])->paginate(15);
        }else{
            $rekapMasuk = presensiIn::whereMonth('tgl_presensi', $bulanIni)->orderBy('tgl_presensi')->paginate('15');
        }
        return view('admin.rekapPresensi.presensiIn', compact('rekapMasuk', 'today'));
    }

    public function exportMasuk(){
        return Excel::download(new ExportMasuk, "Rekap_Presensi_Masuk.xlsx");
    }

    public function rekapOut(Request $request){
        // dd($request);
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $keyword = $request->search;
        $start_to = $request->date_start;
        $end_to = $request->date_to;

        if(strlen($keyword)){
            $rekapPulang = presensiOut::where('nip', 'like', "%$keyword%")
            ->orWhere('name', 'like', "%$keyword%")->paginate(15);
        }elseif($keyword OR ($start_to OR $end_to)){
            $rekapPulang = presensiOut::whereBetween('tgl_presensi_out', [$start_to, $end_to])->paginate(15);
        }else{
            $rekapPulang = presensiOut::whereMonth('tgl_presensi_out', $bulanIni)->orderBy('tgl_presensi_out')->paginate('15');
        }
        return view('admin.rekapPresensi.presensiOut', compact('rekapPulang', 'today'));
    }

    public function exportPulang(){
        return Excel::download(new ExportPulang, "Rekap_Presensi_Pulang.xlsx");
    }
}
