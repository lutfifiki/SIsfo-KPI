@extends('layouts.master')	

@section('header')

<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/> 	


@stop	

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
                                <strong class="card-title">Data Penilaian {{$rapor->nama}} </strong>
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">+ Tambah Data Penilaian</button><br>
                              </div>
                            <div class="card-body">

								<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
				                        <thead class="thead-dark">
				                            <tr align="center">
				                            	<th scope="col">NO</th>
				                                <th scope="col">ID</th>
				                                <th scope="col">ASPEK PENILAIAN</th>
				                                <th scope="col">PLAN</th>
				                                <th scope="col">PENCAPIAN</th>
				                                <th scope="col">OPTION</th>				                                
				                            </tr>
				                            </thead>

				                            <?php $no = 0; ?>

				                        @foreach($rapor->aspekpenilaian as $aspekpenilaian)  

				                        	<?php $no++; ?>

											<tr>
												<td align="center">{{ $no }}</td>
												<td align="center"><a>ASP-{{$aspekpenilaian->id}}</a></td>
												<td><a>{{$aspekpenilaian->nama}}</a></td>
												<td align="center">{{$aspekpenilaian->plan}}%</td>
												<td align="center">{{$aspekpenilaian->pencapaian}}%</td>
												<!--  -->
												<td align="center"> 
												<a href="/unit_kerja/{{$aspekpenilaian->id}}/deletenilai" class="btn btn-danger btn-sm" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
											</tr>
										@endforeach	
				             
				                    <tbody>
				                            
				                    </tbody>
				                </table>
						</div>
                    </div>
					</div>


					<div class="col-md-6">
                        <div id="Hasil">    

                        </div>                         
                    </div>

                    <div class="col-md-6">
                    	<div id="Hasilku">
                    		
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
				        <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data Penilaian</b></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				      <div class="modal-body">

				        <form action="/unit_kerja/{{$rapor->id}}/addnilai" method="POST" enctype="multipart/form-data">
				        	
						  <div class="form-group">
						  		{{csrf_field()}}
						  		<label><b>Kategori</b></label>
						   			<input type="text" name="nama" class="form-control" id="nama" placeholder="Kategori" value="{{old('nama')}}">  
						   </div>

						  <div class="form-group">		 
						   		<label><b>Plan</label>
						   			<input type="number" name="plan" class="form-control" id="plan" placeholder="Plan">
						  	</div>

						  <div class="form-group">
						  		<label><b>Pencapaian</b></label>
						  			<input type="number" name="pencapaian" class="form-control" id="pencapaian" placeholder="Pencapaian">
						  </div>					      
						</div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				        <button type="submit" class="btn btn-primary">Simpan</button>
					      </form>
					    </div>
					  </div> 
					</div>
				  
@stop		

@section('footer')
	
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script>

        $(document).ready(function() {y
        $('.nilai').editable();
    });

</script>
	<script src="https://code.highcharts.com/highcharts.js"></script>

	 <script>
	        Highcharts.chart('Hasil', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Grafik Pencapaian Unit Kerja'
	    },
	    xAxis: {
	        categories:  {!!json_encode($katagori)!!},
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
	        data: {!!json_encode($plan)!!}

	    }, {
	        name: 'Pencapaian',
	        data: {!!json_encode($hasil)!!}

	    }]
	});
    </script>
    <script>
    	Highcharts.chart('Hasilku', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Hasil Persentase Pencapaian (%)'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: {!!json_encode($katagori)!!},
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: ' (%)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' %'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Plan',
        data: {!!json_encode($plan)!!}
    }, {
        name: 'Pencapaian',
        data: {!!json_encode($hasil)!!}
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
@endsection				   -->