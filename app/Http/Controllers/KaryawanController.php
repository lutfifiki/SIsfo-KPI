<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->has('cari')) {
    		$karyawan = \App\Karyawan::where('nama','LIKE','%' .$request->cari. '%')->get();
    	} else {
    		$karyawan = \App\Karyawan::all();
            $uk = \App\Unitkerja::all();
    	}   	
    	//App = nameSpace dari kelas Karyawan
    	return view('karyawan.index',['karyawan' => $karyawan, 'uk' => $uk]);
    }

    public function indexs(Request $request)
    {
        if ($request->has('cari')) {
            $users = \App\Karyawan::where('nama','LIKE','%' .$request->cari. '%')->get();
        } else {
            $users = \App\Karyawan::all();
        }       
                    //App = nameSpace dari kelas Karyawan
        return view('karyawan.index_users',['users' => $users]);
    }

    public function editdata($id)
    {
        $users = \App\Karyawan::find($id);

        return view('karyawan/edit_users',['users' => $users]);                             
    }

    public function deletedata($id)
    {
        $users = \App\Karyawan::find($id);
        $users->delete($users);
        return redirect('/karyawan/index_users')->with('Sukses', 'Data Berhasil di Hapus');
    }

    public function updatedata(Request $request,$id)
    {
        $users = \App\Karyawan::find($id);
        $users->update($request->all());

        return redirect('/karyawan/index_users')->with('Sukses', 'Data Karyawan Berhasil di Update');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required|min:4' ,
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

    public function createUsers(Request $request)
    {
        $this->validate($request, [
        'nama_depan' => 'required|min:4' ,
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
        $request->request->add(['unitkerja_id' => auth()->user()->unitkerja->id]);
        $karyawan = \App\Karyawan::create($request->all());

        return redirect('/karyawan/index_users')->with('Sukses', 'Data Berhasil Ditambahkan');

    }

    public function edit($id)
    {
    	$karyawan = \App\Karyawan::find($id);

    	return view('karyawan/edit',['karyawan' => $karyawan]);								
    }

        public function editUK($idUK)
    {
        $karyawanku = \App\Karyawan::find($idUK); 
        $uk = \App\Unitkerja::all();

        return view('karyawan/editUK',['karyawanku' => $karyawanku, 'uk' => $uk]);                                
    }

        public function updateUK(Request $request,$id)
        {
            $karyawanku = \App\Karyawan::find($id);
            $karyawanku->update($request->all());

            return redirect('/karyawan')->with('Sukses', 'Data UK Berhasil di Update');
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
        $keyindicator = \App\Kpi::all();


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
