<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AspekpenilaianController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->has('cari')) {
    		$aspekpenilaian = \App\Aspekpenilaian::where('nama','LIKE','%' .$request->cari. '%')->get();
    	} else{
    		$aspekpenilaian = \App\Aspekpenilaian::all();

            $unitker = \App\Unitkerja::all();
    
    	}	
    	 			//App = nameSpace dari kelas uk Kerja
    	return view('aspek_penilaian.index',['aspekpenilaian' => $aspekpenilaian, 'unitker' => $unitker]);
    }

    public function create(Request $request)
    {
        \App\Aspekpenilaian::create($request->all());
        return redirect('/aspek_penilaian')->with('Sukses', 'Data Berhasil ditambahkan');
    }

    public function edit($id)
    {
        $aspekpenilaian = \App\Aspekpenilaian::find($id); 
        return view('aspek_penilaian/edit',['aspekpenilaian' => $aspekpenilaian, 'unit' => $unit]);
    }

    public function update(Request $request,$id)
    {
        $aspekpenilaian = \App\Aspekpenilaian::find($id);
        $aspekpenilaian->update($request->all());

        return redirect('/aspek_penilaian')->with('Sukses', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $aspekpenilaian = \App\Aspekpenilaian::find($id);
        $aspekpenilaian->delete($aspekpenilaian);
        return redirect('/aspek_penilaian')->with('Sukses', 'Data Berhasil di Hapus');
    }
}
