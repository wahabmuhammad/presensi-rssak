<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;


class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {

        $request->validate(
            [
                'nip' => 'required',
                'password' => 'required'
            ],
            [
                'nip.required' => 'NIP wajib diisi',
                'password.required' => 'password wajib diisi',
            ]
        );

        $infologin = [
            'nip' => $request->nip,
            'password' => $request->password,
        ];

        $user = User::whereRaw('nip ILIKE ?', [$request->nip])->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if ($user->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/dashboard');
            }
        } else {
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
