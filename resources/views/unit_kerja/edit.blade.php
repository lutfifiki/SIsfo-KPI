@extends('layouts.master')

@section('content')

	<div class="content mt-3">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Data Unit Kerja
                        </div>
                            <div class="card-body card-block">

                                <form action="/unit_kerja/{{$unitkerja->id}}/update" method="post" enctype="multipart/form-data">
				     {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class=" form-control-label">Nama UK</label>
                                </div>
                                    <div class="col-12">
                                        <input type="text" name="nama" id="nama" class="form-control" value="{{$unitkerja->nama}}">
                                    </div>
                            </div>    
                                
						<button type="submit" class="btn btn-warning btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Update
                        </button>
                        
				      </div> 
				</form>

				</div>
			</div>
		</div>
	</div>

@stop