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

        @foreach($rapor as $rapor) 
        
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="/unit_kerja/{{$rapor->id}}/profile">Detail</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <p class="text-light"><b>{{$rapor->nama}}</b></p>
                        </h4>
                            <span class="count">{{$rapor->karyawan->count()}}</span> <i>Pegawai</i>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
        @endforeach    



@stop