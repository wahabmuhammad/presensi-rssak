<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class presensiOut_Controller extends Controller
{
    public function index(){
        return view('absensi.pulang');
    }

    public function store(Request $request){
        $name = Auth::user()->name;
        $nip = Auth::user()->nip;
        $tgl_presensi_out = date("Y-m-d");
        $jam_out = date("H:i:s");
        $lokasi_out = $request->lokasi;
        $image = $request->image;
        $folderPath = "public/upload/presensi-pulang/";
        $formatName = $name . "-" . $tgl_presensi_out . " pulang";
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;
        
        $cek = DB::table('presensi_out')->where('tgl_presensi_out', $tgl_presensi_out)->where('nip',$nip)->count();
        if($cek == 0){
            $dataMasuk = [
                'name' => $name,
                'nip' => $nip, 
                'tgl_presensi_out' => $tgl_presensi_out,
                'jam_out' => $jam_out,
                'foto_out' => $fileName,
                'location_out' => $lokasi_out
            ];
            $simpan = DB::table('presensi_out')->insert($dataMasuk);
            if($simpan){
                Storage::put($file, $image_base64);
                echo "success|Hati-Hati di Jalan|out";
            }else{
                echo "error|Silahkan Hubungi TIM IT| ";
            }
        }elseif ($cek == 1) {
            echo "error|Maaf Anda Sudah melakukan Presensi Pulang Hari ini|";
        }
    }
}
