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
                                <strong class="card-title">Aspek Penilaian Unit Kerja {{auth()->user()->karyawan->unitkerja->nama}}</strong>
                            </div>
                            <div class="card-body">

								<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
				                        <thead class="thead-dark" align="center">
				                            <tr>
				                            	<th scope="col">NO</th>
				                                <th scope="col">ID</th>
				                                <th scope="col">KATEGORI</th>
				                                <th scope="col">PLAN</th>
				                                <th scope="col">PENCAPAIAN</th>
				                            </tr>
				                            </thead>

				                            <?php $no = 0; ?>

				                            @foreach(auth()->user()->karyawan->unitkerja->aspekpenilaian as $aspekpenilaian)

				                            <?php $no++; ?>

											<tr align="">
												<td align="center">{{ $no }}</td>
												<td align="center"><a>DPUK-{{$aspekpenilaian->id}}</a></td>
												<td><a>{{$aspekpenilaian->nama}}</a></td>
												<td align="center"><a>{{$aspekpenilaian->plan}}%</a></td>
												<td align="center"><a>{{$aspekpenilaian->pencapaian}}%</a></td>
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
				
@stop	

@section('footer')
	<script src="https://code.highcharts.com/highcharts.js"></script>

    
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
@endsection-->