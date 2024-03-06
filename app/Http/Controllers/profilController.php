<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class profilController extends Controller
{
    public function index($id)
    {
        $id = User::find($id);
        // dd($id);
        return view('absensi.profil', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'jabatan' => 'required',
                'password' => 'confirmed'
            ]
        );
        $password = $request->password;
        $data = User::find($id);
        if ($request->password  == null) {
            $data->update([
                'name'     => $request->nama,
                'jabatan'  => $request->jabatan
            ]);
        } else {
            $data->update([
                'name'     => $request->nama,
                'jabatan'     => $request->jabatan,
                'password'   => $request->password
            ]);
        }
        return back()->with('success', 'Update Data berhasil');
        // dd($request);
    }

    public function slipgaji($id){
        $data = User::findOrFail($id);
        return view('absensi.slipGaji', compact('data'));
    }
}
