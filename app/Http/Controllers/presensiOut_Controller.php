<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DateTime;

class presensiOut_Controller extends Controller
{
    public function index(){
        $today = date("Y-m-d");
        $nip = Auth::user()->nip;
        $cekPulang = DB::table('presensi')->where('presensi.nip',$nip)->latest('presensi.id')->first();
        $tglPresensi = $cekPulang->tgl_presensi;
        // Menggunakan Carbon untuk mendapatkan nama hari
        Carbon::setLocale('id'); // Untuk bahasa Indonesia
        $hari = Carbon::parse($tglPresensi)->translatedFormat('l');
        return view('absensi.pulang',compact('cekPulang','hari'));
    }

    public function store(Request $request){
        // dd($request);
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
        
        $cek = DB::table('presensi')->where('presensi.nip',$nip)->latest('presensi.id')->first();
        $date_in =  new DateTime($cek->tgl_presensi . $cek->jam_in);
        $date_out = new DateTime($tgl_presensi_out . $jam_out);
        $total_jam = $date_in->diff($date_out)->format('%H:%I:%S');
        // $cek = DB::table('presensi_out')->where('tgl_presensi_out', $tgl_presensi_out)->where('nip',$nip)->count();
        if($cek && $cek->tgl_presensi_out == null){
            $dataMasuk = [
                'tgl_presensi_out' => $tgl_presensi_out,
                'jam_out' => $jam_out,
                'foto_out' => $fileName,
                'location_out' => $lokasi_out,
                'total_jamkerja' => $total_jam
            ];
            $simpan = DB::table('presensi')->where('id', $cek->id)->update($dataMasuk);
            if($simpan){
                Storage::put($file, $image_base64);
                list($jam, $menit, $detik) = explode(':', $total_jam);
                echo "success|Hati-Hati di Jalan,, total jam kerja anda ".$jam.PHP_EOL."Jam ".$menit.PHP_EOL." Menit"."|out";
            }else{
                echo "error|Silahkan Hubungi TIM IT| ";
            }
        }elseif ($cek && $cek->tgl_presensi_out !== null) {
            echo "error|Anda belum melakukan presensi masuk hari ini dan anda sudah melakukan presensi pulang pada tanggal ".$cek->tgl_presensi_out." dengan shift ".$cek->shift ."|";
        }
    }
}
