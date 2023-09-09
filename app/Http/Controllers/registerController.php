<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


class registerController extends Controller
{
    public function register(){
        return view('register.register');
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|max:255|unique:users',
            'jabatan' => 'required|string|max:255'
        ]);
        //create to database
        $simpan = User::create($validasi);
        if($simpan){
            echo "0";
        }else{
            echo "1";
        }
        // route to login
        $user = $request->only('nip', 'password');
        Auth::attempt($user);
        return redirect('/dashboard');
    }

    public function update(){
        return view('register.forget');
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request -> only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            :back()->withErrors(['Email' => __($status)]);
    }

    public function reset(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            ]);
        
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            });

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    }
}
