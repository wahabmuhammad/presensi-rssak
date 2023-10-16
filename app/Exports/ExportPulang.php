<?php

namespace App\Exports;

use App\Models\presensiOut;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPulang implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $today = date("Y-m-d");
        $bulanIni = date("m", strtotime($today));
        $rekapPulang = presensiOut::whereMonth('tgl_presensi_out', $bulanIni)->orderBy('tgl_presensi_out')->get();
        return $rekapPulang;
    }
}
