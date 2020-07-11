<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF Token --}}
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jose vet clinic') }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >

    <!-- Custom Style -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('/vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- FastClick -->
    <script src="{{ asset('/vendor/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <link href="{{ asset('/vendor/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset('/vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <!-- select2 -->
    <link href="{{ asset('/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/select2/dist/css/theme/select2-bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body" id="app">
      <div class="main_container">
      {{-- left nav --}}
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('home') }}" class="site_title"><i class="fa fa-paw"></i> <span>Jose vet clinic</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/user.png') }}" alt="user-avatar" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hallo,</span>
                <h2>{{ Auth::user()->name }} </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('home') }}">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('pasien.index') }}">Semua pasien</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('pasien.create') }}">Registrasi pasien baru</a></li>
                      <li><a href="{{ route('periksa.create') }}">Pemeriksaan pasien</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bell"></i> Notifikasi <span class="badge">@include('admin.pages.NotifUltah')</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('ultah.show')}}">Ulang Tahun <span class="badge">@include('admin.pages.NotifUltah')</span></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i> Bantuan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('panduan.index')}}">Panduan operasional</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings" href="{{ route('akun') }}">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('user.logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form2').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <form id="logout-form2" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
              </form>
            </div>
            <!-- /menu footer buttons -->
          </div> <!-- left_col scroll-view -->
        </div> <!-- col-md-3 left_col -->
        {{-- /end left nav --}}

        {{-- top navigation --}}
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/user.png') }}" alt="user-icon">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ route('akun') }}">Settings</a></li>
                    <li>
                        <a href="{{ route('user.logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out pull-right"></i> Log Out
                        </a>

                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="GET">
                        </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        {{-- /top navigation --}}

        {{-- page content --}}
        <div class="right_col" role="main">

          @yield('content')

        </div>
        {{-- /page content --}}

        {{-- footer content --}}
        <footer>
          <div class="pull-right">All right reserved
            &copy;{{ Carbon\Carbon::now('Asia/Jakarta')->format('Y') }} Jose vet clinic </div>
          <div class="clearfix"></div>
        </footer>
        {{-- /footer content --}}
      </div> <!-- main container -->
    </div> <!-- container body -->

    <!-- jQuery -->
    <script src="{{ asset('/vendor/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('/vendor/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('/vendor/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/vendor/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/vendor/fastclick/lib/fastclick.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('/vendor/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('/vendor/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/vendor/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('/vendor/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('/vendor/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('/vendor/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('/vendor/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('/vendor/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('/vendor/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('/vendor/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('/vendor/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{ asset('/vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- validator -->
    <script src="{{ asset('/vendor/validator/validator.js') }}"></script>
    <!-- select2 -->
    <script src="{{ asset('/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/vendor/select2/dist/js/i18n/id.js') }}"></script>
    <!-- Compiled Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('/js/custom.min.js') }}"></script>
    <!-- Modif Theme Scripts -->
    <script src="{{ asset('/js/javascript-modif.js') }}"></script>
    <!-- Date Picker Load-->
    <script src="{{ asset('/js/date-picker.js') }}"></script>
    <!-- ckEditor-wysiwyg -->
    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <!-- ckEditor-wysiwyg Load-->
    <script src="{{ asset('/js/ck-editor.js') }}"></script>
    @yield('script')
  </body>
</html>
