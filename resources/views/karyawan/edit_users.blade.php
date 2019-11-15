@extends('layouts.master')

@section('content')

	<div class="content mt-3">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Data Karyawan <strong>{{$users->nama}}</strong>
                        </div>
                            <div class="card-body card-block">

                                <form action="/karyawan/{{$users->id}}/updatedata" method="post" enctype="multipart/form-data">
				     {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class=" form-control-label">Nama Depan</label>
                                </div>
                                    <div class="col-12">
                                        <input type="text" id="nama_depan" name="nama_depan" class="form-control" value="{{$users->nama_depan}}">
                                    </div>
                            </div> 

				     		<div class="row form-group">
                                <div class="col col-md-12">
                                	<label for="text-input" class=" form-control-label">Nama Lengkap</label>
                                </div>
                                    <div class="col-12">
                                    	<input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="form-control" value="{{$users->nama}}">
                                    </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-12">
                                	<label for="selectSm" class=" form-control-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-12">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    	<option>Jenis Kelamin</option>
                                    	<option value="L" @if($users->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                    	<option value="P" @if($users->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                                </div>
                                    <div class="col-12">
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="{{$users->tempat_lahir}}">
                                    </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                                </div>
                                    <div class="col-12">
                                        <input type="date" id="ttl" name="ttl" placeholder="Tanggal Lahir" class="form-control" value="{{$users->ttl}}">
                                    </div>
                            </div>
                            
                            <div class="row form-group">
                            	<div class="col col-md-12">
                            		<label for="textarea-input" class=" form-control-label">Alamat</label>
                            	</div>
                            	<div class="col-12">
                            		<textarea name="alamat" id="alamat" rows="3" placeholder="Content..." class="form-control">{{$users->alamat}}</textarea>
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