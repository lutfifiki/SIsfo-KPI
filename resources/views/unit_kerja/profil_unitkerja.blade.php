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
                                <strong class="card-title">Aspek Penilaian Unit Kerja {{auth()->user()->unitkerja->nama}}</strong>
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">+ Tambah Aspek Yang Dinilai</button><br>
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
				                                <th scope="col">OPTION</th>
				                            </tr>
				                            </thead>

				                            <?php $no = 0; ?>

				                            @foreach(auth()->user()->unitkerja->aspekpenilaian as $aspekpenilaian)

				                            <?php $no++; ?>

											<tr align="">
												<td align="center">{{ $no }}</td>
												<td align="center"><a>DPUK-{{$aspekpenilaian->id}}</a></td>
												<td><a>{{$aspekpenilaian->nama}}</a></td>
												<td align="center"><a>{{$aspekpenilaian->plan}}%</a></td>
												<td align="center"><a>{{$aspekpenilaian->pencapaian}}%</a></td>
												<td align="center"><a href="/unit_kerja/{{$aspekpenilaian->id}}/editdata" class="btn btn-warning btn-sm">Edit</a> 
												<a href="/unit_kerja/{{$aspekpenilaian->id}}/deletedata" class="btn btn-danger btn-sm" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
											</tr>
											@endforeach	
				             
				                    <tbody>
				                            
				                    </tbody>
				                </table>
						</div>
					</div>
				</div>
					<div class="col-md-6">
                        <div id="chartNilai">      
                        </div>                         
                    </div>

                    <div  class="col-md-6">
                    	<div id="Chart2">
                    
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
				        <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Aspek Penilaian</b></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">

				        <form action="/unit_kerja/postdata" method="POST">

						  <div class="form-group">
						  		{{csrf_field()}}
						  		<label><b>Kategori</b></label>
						   			<input type="text" name="nama" class="form-control" id="nama" placeholder="Kategori" value="{{old('nama')}}">  
						   </div>

						  <div class="form-group">		 
						   		<label><b>Plan</label>
						   			<input type="number" name="nilai" class="form-control" id="nilai" placeholder="Plan">
						  	</div>

						  <div class="form-group">
						  		<label><b>Pencapaian</b></label>
						  			<input type="number" name="pencapaian" class="form-control" id="pencapaian" placeholder="Pencapaian">
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

@section('footer')
	<script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
	        Highcharts.chart('chartNilai', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Grafik Pencapaian Unit Kerja'
	    },
	    xAxis: {
	        categories:  {!!json_encode($categorie)!!},
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Persen (%)'
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Plan',
	        data: {!!json_encode($nilai)!!}

	    }, {
	        name: 'Pencapaian',
	        data: {!!json_encode($pencapaian)!!}

	    }]
	});
    </script>

    <script>
    	Highcharts.chart('Chart2', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Grafik Pencapaian Unit Kerja'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: [{
        categories: {!!json_encode($categorie)!!},
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value}%',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: '',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        title: {
            text: 'Pencapaian',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} %',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 150,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        name: 'Pencapaian',
        type: 'column',
        yAxis: 1,
        data: {!!json_encode($pencapaian)!!},
        tooltip: {
            valueSuffix: ' %'
        }

    }, {
        name: 'Plan',
        type: 'spline',
        data: {!!json_encode($nilai)!!},
        tooltip: {
            valueSuffix: '%'
        }
    }]
});	
    </script>
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