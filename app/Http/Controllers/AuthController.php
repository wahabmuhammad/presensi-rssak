<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;


class AuthController extends Controller
{
    public function proseslogin(Request $request){
        // if(Auth::guard('pegawai')->attempt(['nip' => $request->nip, 'password' => $request->password])){
        //     return redirect('/dashboard');
        // }else{
        //     return redirect('/');
        // }

        $request->validate(
            [
            'nip' => 'required',
            'password' => 'required'
            ],[
                'nip.required' => 'NIP wajib diisi',
                'password.required' => 'password wajib diisi',
            ]);

        $infologin = [
            'nip'=>$request->nip,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('/dashboard');
        }else{
            return redirect('/')->withErrors('NIP atau Password tidak sesuai')->withInput();
        }
        
    }
    public function logout(Request $request)
        {
            Auth::logout();
    
            request()->session()->invalidate();
    
            request()->session()->regenerateToken();
    
            return redirect('/');
        }
}
