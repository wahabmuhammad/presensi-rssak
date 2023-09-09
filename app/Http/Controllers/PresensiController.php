<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    public function index(){
        $today = date("Y-m-d");
        
        $nip = Auth::user()->nip;
        $cek = DB::table('presensi')->where('tgl_presensi', $today)->where('nip',$nip)->count();
        return view('absensi.create', compact('cek'));
    }

    public function store(Request $request){
        $name = Auth::user()->name;
        $nip = Auth::user()->nip;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");
        $lokasi = $request->lokasi;
        $image = $request->image;
        $folderPath = "public/upload/presensi/";
        $formatName = $name . "-" . $tgl_presensi;
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;
        
        $cek = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nip',$nip)->count();
        if($cek == 0){
            $dataMasuk = [
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
                echo "success|Semangat Bekerja Hari ini|in";
            }else{
                echo "error|Silahkan Hubungi TIM IT";
            }
        }elseif ($cek == 1) {
            $dataPulang = [
                'jam_out' => $jam,
                'foto_out' => $fileName,
                'location_out' => $lokasi
            ];
            $update = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('name', $name)->update($dataPulang);
            if($update){
                echo "success|Hati-hati di Jalan|out";
                Storage::put($file, $image_base64);
            }else{
                echo "error|Silahkan Hubungi TIM IT";
            }
        }else{
            echo "Maaf Anda Sudah melakukan Presensi Hari ini";
        }
    }
}
