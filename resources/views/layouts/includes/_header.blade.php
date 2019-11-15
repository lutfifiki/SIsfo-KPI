<header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-12">

                    <div class="header-left">
                            <i><strong>KPI UTSG Online</strong></i>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img class="user-avatar rounded-circle" src="{{asset('admin/images/images.png')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i><span>{{auth()->user()->name}}</span></i>
                        </a>
                    </div>
                </div>

                </div>
            </div>

        </header><!-- /header -->