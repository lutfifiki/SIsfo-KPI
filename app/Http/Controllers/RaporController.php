<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaporController extends Controller{

	public function index(Request $request)
    {
    	if ($request->has('cari')) {
    		$rapor = \App\Unitkerja::where('nama','LIKE','%' .$request->cari. '%')->get();
    	} else {
    		$rapor = \App\Unitkerja::all();
    	}   	
    	 			//App = nameSpace dari kelas Unit Kerja
    	return view('rapor.index',['rapor' => $rapor]);
    }


    //     $keyindicator = \App\Aspekpenilaian::all();;


    // //menyiapkan data untuk chart
    //     $categories = [];
    //     $data = [];
    //     $nilai =[];

    //     foreach($keyindicator as $kp){
    //         $categories[] = $kp->nama;
    //         $nilai[] = $kp->nilai;
    //         $data[] = $unitkerja->unitkerja()->wherePivot('unitkerja_id', $kp->id)->first()->pivot->nilaiku;
    //         }

    //         //dd($data);

    //     return view('rapor.profile',['unitkerja' => $unitkerja, 'keyindicator' => $keyindicator,'nilai' =>  $nilai, 'categories' => $categories, 'data' => $data]);
    }

