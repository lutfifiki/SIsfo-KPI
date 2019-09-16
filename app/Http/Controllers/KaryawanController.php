<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->has('cari')) {
    		$data_karyawan = \App\Karyawan::where('nama','LIKE','%' .$request->cari. '%')->get();
    	} else {
    		$data_karyawan = \App\Karyawan::all();
    	}   	
    	 			//App = nameSpace dari kelas Karyawan
    	return view('karyawan.index',['data_karyawan' => $data_karyawan]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required|min:5' ,
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',

        ]);
        //insert untuk tabel Users
        $user = new \App\User;
        $user->role = 'karyawan';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt ('Abcd123');
        $user->remember_token= str_random(60);
        $user->save();

        //Insert untuk tabel Karyawan
        $request->request->add(['user_id' => $user->id ]);
        $karyawan = \App\Karyawan::create($request->all());
        return redirect('/karyawan')->with('Sukses', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
    	$karyawan = \App\Karyawan::find($id);  
    	return view('karyawan/edit',['karyawan' => $karyawan]);								
    }

    public function update(Request $request,$id)
    {
    	$karyawan = \App\Karyawan::find($id);
    	$karyawan->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $karyawan->avatar = $request->file('avatar')->getClientOriginalName();
            $karyawan->save();
        }
    	return redirect('/karyawan')->with('Sukses', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
    	$karyawan = \App\Karyawan::find($id);
    	$karyawan->delete($karyawan);
    	return redirect('/karyawan')->with('Sukses', 'Data Berhasil di Hapus');
    }

    public function profile($id)
    {
        $karyawan = \App\Karyawan::find($id);
        $keyindicator = \App\Kpi::all();;


    //menyiapkan data untuk chart
        $categories = [];
        $data = [];

        foreach($keyindicator as $kp){
            $categories[] = $kp->devisi;
            $data[] = $karyawan->kpi()->wherePivot('kpi_id', $kp->id)->first()->pivot->pencapaian;
            $standart[] = $kp->standart;
            }

            //dd($data);

        return view('karyawan.profile',['karyawan' => $karyawan, 'keyindicator' => $keyindicator,'standart' => $standart, 'categories' => $categories, 'data' => $data]);
    }


    public function addpendapatan(Request $request, $idkaryawan)
    {
       
        $karyawan = \App\Karyawan::find($idkaryawan);
        $karyawan->kpi()->attach($request->kpi,["pencapaian" => $request->pencapaian]);

        return redirect('karyawan/' .$idkaryawan. '/profile')->with('Sukses Dimasukkan');
    }
}
