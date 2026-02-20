<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                'jabatan' => 'nullable',
                'password' => 'confirmed'
            ]
        );
        $password = $request->password;
        $data = User::find($id);
        // dd($data);
        if ($request->password  == null) {
            $data->update([
                'nip'      => $request->nip,
                'name'     => $request->nama,
                'pegawaifk'=> $request->pegawai_fk,
                // 'jabatan'  => $request->jabatan
            ]);
        } else {
            $data->update([
                'name'     => $request->nama,
                'nip'      => $request->nip,
                'password'   => Hash::make($password),
                'pegawaifk'=> $request->pegawai_fk,
            ]);
        }
        return back()->with('success', 'Update Data berhasil');
    }

    public function get_data_pegawai(Request $request)
    {
        $keyword = $request->query('query');
        $pegawai = DB::table('pegawai_m')
            ->whereRaw('LOWER(nip) = LOWER(?)', [$keyword])
            ->select('id', 'nip', 'nama_lengkap')
            ->get();


        return response()->json($pegawai);
    }

    public function slipgaji($id)
    {
        $data = User::findOrFail($id);
        return view('absensi.slipGaji', compact('data'));
    }
}
