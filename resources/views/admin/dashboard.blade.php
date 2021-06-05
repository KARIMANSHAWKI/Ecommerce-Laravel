    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet"
            href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index3.html" class="nav-link">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">{{ __('messages.contacts') }}</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li>
                        {{-- <ul class="dropdown nav-item ">
                        <li>
                            <a class="nav-link"
                             
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                      </ul> --}}
                    </li>
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-language" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="dropdown-item">
                                    {{ $properties['native'] }}
                                    <span class="sr-only">(current)</span></a>
                                </a>
                                <div class="dropdown-divider"></div>
                            @endforeach
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">name</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                            <li class="nav-item">
                                <a href="{{ route('category.show') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Manage Category
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Layout Options
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">6</span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/layout/top-nav.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Top Navigation</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Top Navigation + Sidebar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/boxed.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Boxed</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Fixed Sidebar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Fixed Navbar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/fixed-footer.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Fixed Footer</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Collapsed Sidebar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Charts
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/charts/chartjs.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ChartJS</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/charts/flot.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Flot</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/charts/inline.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inline</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tree"></i>
                                    <p>
                                        UI Elements
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/UI/general.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>General</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/icons.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Icons</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/buttons.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Buttons</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/sliders.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sliders</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/modals.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Modals & Alerts</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/navbar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Navbar & Tabs</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/timeline.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Timeline</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/UI/ribbons.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ribbons</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-plus-square"></i>
                                    <p>
                                        Extras
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/examples/login.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Login</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/register.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Register</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/forgot-password.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Forgot Password</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/recover-password.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Recover Password</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/lockscreen.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lockscreen</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Legacy User Menu</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/language-menu.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Language Menu</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/404.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Error 404</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/500.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Error 500</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/pace.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pace</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/examples/blank.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Blank Page</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="starter.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Starter Page</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">{{ __('messages.Welcome Admin') }}:)</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">{{ __('messages.home') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('messages.Dashboard') }}</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">


                        @yield('content')



                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.0.4
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)

        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>

        <script>
            $(document).ready(function() {
                $("#create").on("click", function(event) {
                        event.preventDefault();
                        // alert("hello");

                        $.ajax({
                                url: "{{ route('add.category') }}",
                                method: "POST",
                                data: new FormData(document.getElementById("category")),
                                dataType: 'JSON',
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(response) {
                                    $("#category_table tbody").prepend(
                                        `<tr><td>${response.id}</td><td>${response.name}</td>
                                            <td><img src="/images/${response.image}"/>/td> /></tr>`
                                    );
                                    $('#categoryModel').modal('toggle');
                                    $('#category')[0].reset();
                                }
                        });
                });

            });

        </script>
        <script>
            function editCategory(id) {
                $.get('/category/' + id, function(category) {
                    $("#id").val(category.id);
                    $("#name2").val(category.name);
                    $("#image").val(category.image);
                    $("#categoryEdit").modal('toggle');

                })
            }

            $('#categoryEditForm').submit(function(e) {
                e.preventDefault();
                let id = $("#id").val();
                let name = $("#name2").val();
                let image = $("#image").val();
                let _token = '{{ csrf_token() }}';

                $.ajax({
                    url: "{{ route('category.update') }}",
                    type: "POST",
                    data: {
                        id: id,
                        name: name,
                        image: image,
                        _token: _token
                    },
                    success: function(response) {
                        $('#categoryEdit').modal('toggle');
                        $('#categoryEditForm')[0].reset();
                    }
                })

            })

        </script>
    </body>

    </html>
