<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class potonganGajiController extends Controller
{
    public function obatperiksa_pegawai_index()
    {
        return view('admin.penggajian.obatdanperiksa');
    }

    public function kretab_pegawai_index()
    {
        return view('admin.penggajian.kretab');
    }

    public function koperasi_pegawai_index()
    {
        return view('admin.penggajian.koperasi');
    }

    public function potongan_lain_pegawai_index()
    {
        return view('admin.penggajian.potonganLain');
    }

}
