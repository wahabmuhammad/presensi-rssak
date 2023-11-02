<?php

namespace App\Exports;

use App\Models\presensiIn;
use Maatwebsite\Excel\Concerns\FromCollection;

class  ExportMasuk implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $rekapMasuk = presensiIn::whereMonth('tgl_presensi', $bulanIni)->orderBy('tgl_presensi')->get();
        return $rekapMasuk;
    }
}
