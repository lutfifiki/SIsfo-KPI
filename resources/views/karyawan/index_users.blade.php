@extends('layouts.master')		

@section('content')

	@if(session('Sukses'))
        <div class="sufee-alert alert with-close alert-succes alert-dismissible fade show">
                {{session('Sukses')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif   

	<div class="content mt-3">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Karyawan Unit Kerja {{auth()->user()->unitkerja->nama}}</strong>
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">+ Tambah Data</button><br>
                            </div>
                            <div class="card-body">
								<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
				                        <thead class="thead-dark">
				                            <tr align="center">
				                            	<th scope="col">NO</th>
				                                <th scope="col">ID PEGAWAI</th>
				                                <th scope="col">NAMA</th>
				                                <th scope="col">JENIS KELAMIN</th>
				                                <th scope="col">TEMPAT LAHIR</th>
				                                <th scope="col">TANGGAL LAHIR</th>
				                                <th scope="col">ALAMAT</th>
				                                <th scope="col">OPTION</th>
				                            </tr>
				                             </thead>

				                           <?php $no = 0;  ?>

				                           @foreach(auth()->user()->unitkerja->karyawan as $users)

				                           <?php $no++ ; ?>

											<tr align="">
												<td align="center">{{$no}}</td>
												<td>UTSG-{{$users->id}}</a></td>
												<td>{{$users->nama}}</a></td>
												<td align="center">{{$users->jenis_kelamin}}</td>
												<td align="center">{{$users->tempat_lahir}}</a></td>
												<td align="center">{{$users->ttl}}</td>
												<td align="center">{{$users->alamat}}</td>
												<td align="center"><a href="/karyawan/{{$users->id}}/edit_users" class="btn btn-warning btn-sm">Edit</a>
												<a href="/karyawan/{{$users->id}}/deletedata" class="btn btn-danger btn-sm" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
											</tr>

											@endforeach	
				                       
				                    <tbody>
				                            
				                    </tbody>
				                </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>					<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data Karyawan</b></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">

				        <form action="\karyawan\createUsers" method="post">
				        	{{csrf_field()}}
						  <div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}">
						  		<label><b>Nama Depan</b></label>
						   			 <input type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Nama Depan" value="{{old('nama_depan')}}">
						   	@if($errors->has('nama_depan'))
						   		<small class="help-block">{{$errors->first('nama_depan')}}</small>
						   	@endif		

						    	<br><label><b>Nama Lengkap</b></label>
						   			 <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="{{old('nama')}}">
						   		<br><label><b>Email</b></label>
						   			 <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
						   	@if($errors->has('email'))
						   		<small class="help-block">{{$errors->first('email')}}</small>
						   	@endif	

						   		<br><label for="exampleFormControlSelect1"><b>Jenis Kelamin</b></label>
								    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
								      <option>Jenis Kelamin</option>
								      <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
								      <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
								    </select>
							@if($errors->has('jenis_kelamin'))
						   		<small class="help-block">{{$errors->first('jenis_kelamin')}}</small>
						   	@endif	

						   	<br><label><b>Tempat Lahir</b></label>
						   		<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
						   	@if($errors->has('tempat_lahir'))
						   		<small class="help-block">{{$errors->first('tempat_lahir')}}</small>
						   	@endif	

						   	<br><label><b>Tanggal Lahir</b></label>
						   		<input type="date" name="ttl" class="form-control" id="ttl" placeholder="Tanggal Lahir" value="{{old('ttl')}}">
						   	@if($errors->has('ttl'))
						   		<small class="help-block">{{$errors->first('ttl')}}</small>	
						   	@endif
						   		<br><label><b>Alamat</b></label>
						   			 <textarea class="form-control" name="alamat" id="alamat" rows="3">{{old('alamat')}}</textarea>	
						   	@if($errors->has('alamat'))
						   		<small class="help-block">{{$errors->first('alamat')}}</small>	
						   	@endif		 
						  	</div>					      
						</div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				        <button type="submit" class="btn btn-primary">Simpan</button>

				      </div>
				     </form>
				    </div>
				  </div> <!-- /Modal -->
@stop		
<!-- 
@section('content1')		
		@if(session('Sukses'))
			<div class="alert alert-success" role="alert">
				{{session('Sukses')}}
			</div>

		@endif	
		<div class="row">

			<div class="col-12">
				
				<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
				  + Tambah Data
				</button>
			</div>
	<table class="table table-hover ">
		<tr align="center">
			<th>ID PEGAWAI</th>
			<th>NAMA</th>
			<th>JENIS KELAMIN</th>
			<th>ALAMAT</th>
			<th>AKSI</th>
		</tr>

	</table>	
		</div>
	</div>
@endsection				   -->