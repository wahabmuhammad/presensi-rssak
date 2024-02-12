<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class profilController extends Controller
{
    public function index($id){
        $id = User::find($id);
        // dd($id);
        return view('absensi.profil', compact('id'));
    }
}
