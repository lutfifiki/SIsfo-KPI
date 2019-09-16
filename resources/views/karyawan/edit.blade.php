@extends('layouts.master')

@section('content')

	<div class="content mt-3">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Data Karyawan
                        </div>
                            <div class="card-body card-block">

                                <form action="/karyawan/{{$karyawan->id}}/update" method="post" enctype="multipart/form-data">
				     {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class=" form-control-label">Nama Depan</label>
                                </div>
                                    <div class="col-12">
                                        <input type="text" id="nama_depan" class="form-control" value="{{$karyawan->nama_depan}}">
                                    </div>
                            </div>    
				     		<div class="row form-group">
                                <div class="col col-md-12">
                                	<label for="text-input" class=" form-control-label">Nama Lengkap</label>
                                </div>
                                    <div class="col-12">
                                    	<input type="text" id="nama" placeholder="Nama Lengkap" class="form-control" value="{{$karyawan->nama}}">
                                    </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-12">
                                	<label for="selectSm" class=" form-control-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-12">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    	<option>Jenis Kelamin</option>
                                    	<option value="L" @if($karyawan->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                    	<option value="P" @if($karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div>  

                            <div class="row form-group">
                            	<div class="col col-md-12">
                            		<label for="textarea-input" class=" form-control-label">Alamat</label>
                            	</div>
                            	<div class="col-12">
                            		<textarea name="alamat" id="alamat" rows="3" placeholder="Content..." class="form-control">{{$karyawan->alamat}}</textarea>
                            	</div>
                            </div>   

                            <div class="row form-group">
                            	<div class="col col-md-12">
                            		<label for="file-input" class=" form-control-label">Avatar</label>
                            	</div>
                            	<div class="col-12">
                            		<input type="file" id="avatar" name="avatar" class="form-control-file">
                            		<small class="help-block form-text">Ukuran tidak boleh lebih dari 1MB</small>
                            	</div>
                            </div>

						<button type="submit" class="btn btn-warning btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Update
                        </button>
				      
				</form>

				</div>
			</div>
		</div>
	</div>

@stop
<!-- @section('content1')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Edit Karyawan</h2>
				<form action="/karyawan/{{$karyawan->id}}/update" method="post">
				     {{csrf_field()}}
						<div class="form-group">
						   	<label>Nama</label>
						   		<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="{{$karyawan->nama}}">
						   	<label for="exampleFormControlSelect1">Jenis Kelamin</label>
								    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
								      <option>Jenis Kelamin</option>
								      <option value="L" @if($karyawan->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
								      <option value="P" @if($karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
								    </select>
						   	<label>Alamat</label>
						   	<textarea class="form-control" name="alamat" id="alamat" rows="3" >{{$karyawan->alamat}}</textarea>	 	 
						  	</div>
						 <button type="submit" class="btn btn-warning">Update</button>					      
				</form>
			</div>	
		</div>
@endsection	 -->	