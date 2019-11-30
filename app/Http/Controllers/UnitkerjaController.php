<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unitkerja;

class UnitkerjaController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->has('cari')) {
    		$unitkerja = \App\Unitkerja::where('nama','LIKE','%' .$request->cari. '%')->get();
    	} else {
    		$unitkerja = \App\Unitkerja::all();
    	}   	
    	 			//App = nameSpace dari kelas Unit Kerja
    	return view('unit_kerja.index',['unitkerja' => $unitkerja]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:users',

        ]);
        //insert untuk tabel Users
        $user = new \App\User;
        $user->role = 'AdminUK';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt ('Abcd123');
        $user->remember_token= str_random(60);
        $user->save();

        //Insert ke Table Unit Kerja  
        $request->request->add(['user_id' => $user->id ]);
        $unitkerja = \App\Unitkerja::create($request->all());

        return redirect('/unit_kerja')->with('Sukses', 'Data Berhasil Ditambahkan');
    }

    public function delete(\App\Unitkerja $unitkerja)
    {
        $unitkerja->delete($unitkerja);
        return redirect('/unit_kerja')->with('Sukses', 'Data Berhasil di Hapus');
    }

    public function edit($id)
    {
        $unitkerja = \App\Unitkerja::find($id);  
        return view('unit_kerja/edit',['unitkerja' => $unitkerja]);                             
    }

    public function update(Request $request,$id)
    {
        $unitkerja = \App\Unitkerja::find($id);
        $unitkerja->update($request->all());

        return redirect('/unit_kerja')->with('Sukses', 'Data Berhasil di Update');
    }

    public function profile($id)
    {
        $rapor = \App\Unitkerja::find($id); 
        $asp = \App\Aspekpenilaian::all();

        $katagori = [];
        $plan = [];
        $hasil = [];

        foreach ($rapor->aspekpenilaian as $aspk){
            $katagori[] = $aspk->nama;
            $plan[] = $aspk->plan;
            $hasil[] = $aspk->pencapaian;
        }
        
        return view('unit_kerja/profile',['rapor' => $rapor, 'asp' => $asp, 'katagori' => $katagori, 'plan' => $plan, 'hasil' => $hasil]); 
    }

    public function profilunit()
    {       
        $categorie = [];
        $nilai = [];
        $pencapaian = [];

        foreach (auth()->user()->unitkerja->aspekpenilaian as $aspek) {
                
                $categorie[] = $aspek->nama;
                $nilai[] = $aspek->plan;
                $pencapaian[] = $aspek->pencapaian;
        }


        return view('unit_kerja/profil_unitkerja',['categorie' => $categorie,'nilai' => $nilai,'pencapaian' => $pencapaian]);    
    }

    public function addnilai(Request $request,$idkuu)
    {
        $rapor = \App\Unitkerja::find($idkuu);

        $request->request->add(['unitkerja_id' => $rapor->id]);
        $aspekpenilaian = \App\Aspekpenilaian::create($request->all());

         return redirect()->back()->with('Sukses','Data Berhasil Ditambahkan');
    }

    public function deletenilai($idunitkerja)
    {
        $aspekpenilaian1 = \App\Aspekpenilaian::find($idunitkerja);
        $aspekpenilaian1->delete($aspekpenilaian1);

        return redirect()->back()->with('Data Sudah Terhapus');
    }

    public function postdata(Request $request)
    {
  
        $request->request->add(['unitkerja_id' => auth()->user()->unitkerja->id]);
        $aspekpenilaian = \App\Aspekpenilaian::create($request->all());

        // dd($request);

        return redirect('/unit_kerja/profile_unitkerja')->with('Sukses', 'Data Berhasil Ditambahkan');
    }

    public function deletedata($iddata)
    {
        $aspekpenilaian = \App\Aspekpenilaian::find($iddata);
        $aspekpenilaian->delete($aspekpenilaian);

        return redirect('/unit_kerja/profile_unitkerja')->with('Sukses', 'Data Berhasil di Hapus');
    }

    public function editdata($id)
    {
        $aspekpenilaian = \App\Aspekpenilaian::find($id);  
        return view('/unit_kerja/edit_data',['aspekpenilaian' => $aspekpenilaian]);
    }

    public function updatedata(Request $request,$id)
    {
        $aspekpenilaian = \App\Aspekpenilaian::find($id);
        $aspekpenilaian->update($request->all());

        return redirect('/unit_kerja/profile_unitkerja')->with('Sukses', 'Data Berhasil di Update');
    }

    public function profileus()
    {   
        $katagory = [];
        $rencana = [];
        $target = [];

        foreach (auth()->user()->karyawan->unitkerja->aspekpenilaian as $sepek) {

        $katagory[] = $sepek->nama;
        $rencana[] = $sepek->plan;
        $target[] = $sepek->pencapaian;    

    }
        return view('unit_kerja/profile_users', ['katagory' => $katagory, 'rencana' => $rencana, 'target' => $target]);


    }
}    