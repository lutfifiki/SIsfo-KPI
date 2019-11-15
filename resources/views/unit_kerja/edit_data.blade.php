@extends('layouts.master')

@section('content')

	<div class="content mt-3">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Penilaian Unit Kerja <strong>{{auth()->user()->unitkerja->nama}}</strong>
                        </div>
                            <div class="card-body card-block">

                                <form action="/unit_kerja/{{$aspekpenilaian->id}}/updatedata" method="post" enctype="multipart/form-data">
				     {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class="form-control-label">Kategori</label>
                                </div>
                                    <div class="col-12">
                                        <input type="text" name="nama" id="nama" class="form-control" value="{{$aspekpenilaian->nama}}">
                                    </div>
                            </div>    


                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class="form-control-label">Plan</label>
                                </div>
                                    <div class="col-12">
                                        <input type="number" name="nilai" id="nilai" class="form-control" value="{{$aspekpenilaian->nilai}}">
                                    </div>
                            </div> 

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class="form-control-label">Pencapaian</label>
                                </div>
                                <div class="col-12">
                                    <input type="number" name="pencapaian" id="Pencapaian" class="form-control" value="{{$aspekpenilaian->pencapaian}}">
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