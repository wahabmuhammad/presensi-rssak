<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lemburController extends Controller
{
    public function daftarpengajuanLemburIndex()
    {
        return view('admin.lembur.daftar-pengajuan-lembur');
    }

    public function lemburDisetujuiIndex()
    {
        return view('admin.lembur.lembur-disetujui');
    }
}
