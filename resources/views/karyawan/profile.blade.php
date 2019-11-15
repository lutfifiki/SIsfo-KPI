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
                    <div class="col-md-6">
                        <section class="card">
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <div class="fa fa-twitter wtt-mark"></div>

                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{$karyawan->getAvatar()}}">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-white display-6">{{$karyawan->nama}}</h2>
                                    </div>
                                </div>                                    
                            </div>

                            @foreach($karyawan->kpi as $kpi)
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h5>{{$karyawan->id}}</h5>
                                        NIP
                                    </li>
                                    <li>
                                        <h5>{{$kpi->devisi}}</h5>
                                        Devisi
                                    </li>
                                    <li>
                                        <h5>{{$kpi->pivot->pencapaian}}</h5>
                                        Pendapatan
                                    </li>
                                </ul>
                            @endforeach    
                            </div>
                            <div class="twt-write col-sm-12">
                                <button type="button" class="btn btn-primary col-sm-12" data-toggle="modal" data-target="#exampleModal">
Tambah Data
                                </button>
                            </div>
                            <footer class="twt-footer">
                                
                                <a href="#"><i class="fa fa-map-marker"></i></a>
                                {{$karyawan->alamat}}
                                <span class="pull-right">
                                    {{$karyawan->id}}
                                </span>
                            
                            </footer>
                        </section>
                    </div> 
                  </div>
                    <div class="col-md-6">
                        <div id="chartNilai">
                                     
                        </div>                         
                    </div>

                    <div class="col-md-6">
                        <div id="KurvaPendapatan">                          
                        </div>
                    </div>    
 
                    <div class="col-md-6">
                        <br>
                        <div id="ChartStack">  
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <br>
                        <div id="Chart4">  
                        </div>
                    </div> 
    	    </div>
    	</div>
    </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data Pendapatan</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         <form action="\karyawan\{{$karyawan->id}}/addpendapatan" method="post">
                            {{csrf_field()}}
                            <label for="exampleFormControlSelect1"><b>Devisi</b></label>
                                <select class="form-control" name="kpi">
                                    @foreach($keyindicator as $kp)
                                      <option value="{{$kp->id}}">{{$kp->devisi}}</option>
                                      @endforeach
                                    </select>

                            <div class="form-group{{$errors->has('pencapaian') ? ' has-error' : ''}}">
                                <label><b>Pencapaian</b></label>
                                     <input type="number" name="pencapaian" class="form-control" id="pencapaian" placeholder="Pencapaian" >
                            @if($errors->has('pencapaian'))
                                <small class="help-block">{{$errors->first('pencapaian')}}</small>
                            @endif  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>	

@stop

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        Highcharts.chart('chartNilai', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Laporan Pendapatan Karyawan'
                },
                xAxis: {
                    categories: {!!json_encode($categories)!!},
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Pendapatan (Rp)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b> {point.y:.1f} </b></td></tr>',
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
                    name: 'Target',
                    data: {!!json_encode($standart)!!}

                }, {
                    name: 'Pendapatan',
                    data: {!!json_encode($data)!!}

                }]
            });
    </script>
    <script>
          Highcharts.chart('KurvaPendapatan', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
            },
            xAxis: {
                categories: {!!json_encode($categories)!!},
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'NIlai',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
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
                name: 'Target',
                data: {!!json_encode($standart)!!}
            }, {
                name: 'Pendapatan',
                data: {!!json_encode($data)!!}
            }]
});
    </script>
    <script>
                Highcharts.chart('ChartStack', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Stacked bar chart'
            },
            xAxis: {
                categories: {!!json_encode($categories)!!}
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total fruit consumption'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Pendapatan',
                data: {!!json_encode($data)!!}
            }, {
                name: 'Target',
                data: {!!json_encode($standart)!!}
            }]
        });
    </script>
    <script>
            Highcharts.chart('Chart4', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: [
                'Data Hasil'
            ]
        },
        yAxis: [{
            min: 0,
            title: {
                text: 'Nilai'
            }
        }, {
            title: {
                text: {!!json_encode($categories)!!}
            },
            opposite: true
        }],
        legend: {
            shadow: false
        },
        tooltip: {
            shared: true
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Target',
            color: 'rgba(165,170,217,1)',
            data: {!!json_encode($standart)!!}
        }, {
            name: 'Pendapatan',
            color: 'rgba(126,86,134,.9)',
            data: {!!json_encode($data)!!}
        }]
    });
    </script>
@stop    