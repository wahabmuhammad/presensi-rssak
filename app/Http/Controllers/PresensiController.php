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
    public function index()
    {
        $today = date("Y-m-d");
        $nip = Auth::user()->nip;
        $cekPulang = DB::table('presensi')->where('presensi.nip', $nip)->latest('presensi.id')->first();
        $cek = DB::table('presensi')->where('tgl_presensi', $today)->where('nip', $nip)->count();
        $shift = shift::get();
        // $namaShift = $shift->namashift();
        // dd($shift);
        return view('absensi.masuk', compact('cek', 'cekPulang'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $name = Auth::user()->name;
        $nip = Auth::user()->nip;
        $user_fk = Auth::user()->id;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");
        $shift = $request->shift;
        // $shift = 'pagi 2';
        $shiftModel = shift::get();
        $lokasi = $request->lokasi;
        $image = $request->image;
        $folderPath = "public/upload/presensi-masuk/";
        $formatName = $name . "-" . $tgl_presensi . " masuk";
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;


        $cek = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nip', $nip)->count();
        if ($cek == 0) {
            foreach ($shiftModel as $shifts) {
                $namaShift = $shifts->namashift;
                $jamkerja = $shifts->jammasuk;
                if ($shift == $namaShift) {
                    if ($jam >= $jamkerja) {
                        $jamkerja = \Carbon\Carbon::parse($jamkerja); // Ensure $jamkerja is a Carbon instance
                        $jam = \Carbon\Carbon::parse($jam); // Ensure $jam is a Carbon instance
                        // Calculate the difference in minutes
                        $diff = $jam->diff($jamkerja);
                        // Format the difference as H:i:s
                        $terlambat = sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s);
                        $dataMasuk = [
                            'shift' => $shift,
                            'name' => $name,
                            'nip' => $nip,
                            'tgl_presensi' => $tgl_presensi,
                            'jam_in' => $jam,
                            'foto_in' => $fileName,
                            'location_in' => $lokasi,
                            'jam_terlambat' => $terlambat,
                            'user_fk' => $user_fk
                        ];
                        $simpan = DB::table('presensi')->insert($dataMasuk);
                        if ($simpan) {
                            Storage::put($file, $image_base64);
                            list($jam, $menit, $detik) = explode(':', $terlambat);
                            echo "info|Terimakasih Sudah Hadir. Semangat Bekerja ya. Semoga Allah SWT Mudahkan Urusan Hari Ini.|in";
                        } else {
                            echo "error|Silahkan Hubungi TIM IT";
                        }
                    } else {
                        $dataMasuk = [
                            'shift' => $shift,
                            'name' => $name,
                            'nip' => $nip,
                            'tgl_presensi' => $tgl_presensi,
                            'jam_in' => $jam,
                            'foto_in' => $fileName,
                            'location_in' => $lokasi,
                            'user_fk' => $user_fk
                        ];
                        $simpan = DB::table('presensi')->insert($dataMasuk);
                        if ($simpan) {
                            Storage::put($file, $image_base64);
                            // dd($namaShift);
                            echo "success|Terimakasih Sudah Hadir. Semangat Bekerja ya. Semoga Allah SWT Mudahkan Urusan Hari Ini.|in";
                        } else {
                            echo "error|Silahkan Hubungi TIM IT";
                        }
                    }
                }
            }
        } elseif ($cek == 1) {
            echo "error|Maaf Anda Sudah melakukan Presensi Masuk Hari ini";
        }
    }

    public function dinasluar(Request $request)
    {
        //dd($request);
        return view('absensi.dinasLuar');
    }

    public function indexcuti(Request $request)
    {
        //dd($request);
        return view('absensi.cuti');
    }
}
