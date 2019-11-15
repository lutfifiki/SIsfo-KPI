<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auths.login');
    }

    public function postlogin(Request $request)
    {

    	if(Auth::attempt($request->only('email', 'password'))){
    		return redirect('/dashboard')->with('Sukses','Selamat Anda Berhasil Login');
    	}
    	return redirect('/login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }

    public function unitkerja()
    {
        return $this->hasOne(Unitkerja::class);
    }

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class);
    }
}
