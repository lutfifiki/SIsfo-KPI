@extends('layouts.master')

@section('content')

	<div class="content mt-3">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Data UK Karyawan <strong>{{$karyawanku->nama}}</strong>
                        </div>
                            <div class="card-body card-block">

                            	<form action="/karyawan/{{$karyawanku->id}}/updateUK" method="post" enctype="multipart/form-data">
				     {{csrf_field()}}

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="exampleFormControlSelect1"><b>Unit Kerja</b></label>
								    <select class="form-control" name="unitkerja_id" id="unitkerja_id">
								    	@foreach($uk as $unit)		
								      <option value="{{$unit->id}}">{{$unit->nama}}</option>
								      	@endforeach
								    </select>
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
    </div>
</div>

@stop