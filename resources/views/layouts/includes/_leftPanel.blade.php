    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="./">
                	<img src="{{asset('admin/images/Logo UTSG.png')}}" width="100" height=""50></a>
                <a class="navbar-brand hidden" href="./">
                	<img src="admin/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="/dashboard"><i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>

                    <h3 class="menu-title">Master Data</h3>

                    @if(auth()->user()->role == 'karyawan')

                    <li class=""><a href="/unit_kerja/profile_users"><i class="menu-icon fa fa-dashboard"></i>Result</a></li>

                    @endif

                    @if(auth()->user()->role == 'AdminUK')
                    

                    <li><a href="/karyawan/index_users"><i class="menu-icon fa fa-id-badge"></i>Daftar User</a></li>
                    <li class=""><a href="/unit_kerja/profile_unitkerja"><i class="menu-icon fa fa-dashboard"></i>Result</a></li>

                                        
                    @endif

                    @if(auth()->user()->role == 'admin')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Master Data</a>
                        <ul class="sub-menu children dropdown-menu"><!-- 
                            <li><i class="fa fa-id-card-o"></i><a href="/karyawan">Data Karyawan</a></li> -->
                            <li><i class="fa fa-book"></i><a href="/unit_kerja">Unit Kerja</a></li>          
                            <li><i class="fa fa-id-badge"></i><a href="/karyawan">User</a></li>
                        </ul> 
                    <li class="">
                        <a href="/aspek_penilaian"><i class="menu-icon fa fa-calendar-o"></i>Aspek Penilaian</a>
                    </li> 
                </li>
                    <h3 class="menu-title">Rekap Rapor</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-spinner"></i>Rapor Unit Kerja</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-group"></i><a href="/rapor">Review</a></li>
                            </ul>
                    </li>      
                    @endif
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- "/rapor" -->

    