<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
   public function index(Request $request)
    {
    	if ($request->has('cari')) {
    		$users = \App\Users::where('nama','LIKE','%' .$request->cari. '%')->get();
    	} else {
    		$users = \App\Users::all();
    	}   	
    	 			//App = nameSpace dari kelas Unit Kerja
    	return view('users.index',['users' => $users]);
    }
}
