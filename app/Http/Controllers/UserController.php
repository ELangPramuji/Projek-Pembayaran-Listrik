<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login() {
        return view('login');
    }

    public function autentikasi(Request $request) {
        //dd($request->all());
        $akun = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($akun)) {
            $request->session()->regenerate();

            return redirect()->intended('/hero')->with('Berhasil', 'Anda Berhasil Login');
        } else {

        return redirect('/login')->with('Gagal', 'Akun yang anda masukkan salah');
        }
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // Session::flash('email', $request->email)
    // $request->validate([
    //     'email' => 'required',
    //     'password' => 'required'
    // ], [
    //     'email.required' => $request->email,
    //     'password.required' => $request->password
    // ]);

    // $akun = [
    //     'email' => $request->email,
    //     'password' => $request->password
    // ];
    // if (Auth::attempt($akun)) {
    //     return 'sukses';
    // } else {
    //     return redirect('/login')->withErrors('Akun yang anda masukkan salah');
    // }

}
