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

				<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Unit Kerja UTSG</strong>
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">+ Tambah Data</button><br>
                            </div>
                            <div class="card-body">

								<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
				                        <thead class="thead-dark">
				                            <tr align="center">
				                            	<th scope="col">NO</th>
				                                <th scope="col">ID UNIT KERJA</th>
				                                <th scope="col">NAMA UK</th>
				                                <th scope="col">JUMLAH PEGAWAI</th>
				                                <th scope="col">OPTION</th>
				                            </tr>
				                            </thead>

				                            <?php $no = 0; ?>

				                            @foreach($unitkerja as $unitkerja)

				                            <?php $no++; ?>  

											<tr align="">
												<td align="center">{{ $no }}</td>
												<td align="center"><a>UK-{{$unitkerja->id}}</a></td>
												<td><a href="/unit_kerja/{{$unitkerja->id}}/profile">{{$unitkerja->nama}}</a></td>
												<td align="center">{{$unitkerja->karyawan->count()}}</td>
												<td align="center">
													<a href="/unit_kerja/{{$unitkerja->id}}/edit" class="btn btn-warning btn-sm">Edit</a> 
													<a href="/unit_kerja/{{$unitkerja->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Data Akan Dihapus?')">Hapus</a>
												</td>
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
	</div>
					<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data Unit Kerja</b></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">

				        <form action="/unit_kerja/create" method="POST">
				        	{{csrf_field()}}

						  <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
						  		<label><b>Nama Unit Kerja</b></label>
						   			 <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Unit Kerja" value="{{old('nama')}}">
						   			 @if($errors->has('nama'))
						   			 	<span class="help-block">{{$errors->first('nama')}}</span>
						   			 @endif 
						   </div>
						   			 
						   <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
						   		<label><b>Email</b></label>
						   			<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">	 
						   			@if($errors->has('email'))
						   			 	<span class="help-block">{{$errors->first('email')}}</span>
						   			 @endif
						   	</div>			      
						</div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				        <button type="submit" class="btn btn-primary">Simpan</button>

				      </div>
				     </form>
				    </div>
				  </div> 
				  <!-- /Modal -->
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