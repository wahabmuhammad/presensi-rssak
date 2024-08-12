<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    public function index(){
        $today = date("Y-m-d");
        $nip = Auth::user()->nip;
        $cekPulang = DB::table('presensi')->where('presensi.nip',$nip)->latest('presensi.id')->first();
        $cek = DB::table('presensi')->where('tgl_presensi', $today)->where('nip',$nip)->count();
        $shift = shift::get();
        
        // dd($shift);
        return view('absensi.masuk', compact('cek', 'cekPulang'));
    }

    public function store(Request $request){
        // dd($request);
        $name = Auth::user()->name;
        $nip = Auth::user()->nip;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");
        $shift = $request->shift;
        $lokasi = $request->lokasi;
        $image = $request->image;
        $folderPath = "public/upload/presensi-masuk/";
        $formatName = $name . "-" . $tgl_presensi . " masuk";
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;
        
        
        $cek = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nip',$nip)->count();
        if($cek == 0){
            $dataMasuk = [
                'shift' => $shift,
                'name' => $name,
                'nip' => $nip, 
                'tgl_presensi' => $tgl_presensi,
                'jam_in' => $jam,
                'foto_in' => $fileName,
                'location_in' => $lokasi
            ];
            $simpan = DB::table('presensi')->insert($dataMasuk);
            if($simpan){
                Storage::put($file, $image_base64);
                echo "success|Terimakasih. Selamat Bekerja ya. Semangat!|in";
            }else{
                echo "error|Silahkan Hubungi TIM IT";
            }
        }elseif ($cek == 1) {
            echo "error|Maaf Anda Sudah melakukan Presensi Masuk Hari ini";
        }
    }
}
