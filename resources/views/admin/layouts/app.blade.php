<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Carro &amp; {{$title}}</title>

    <link href="{{url('admin')}}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{url('admin')}}/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{url('admin')}}/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{url('admin')}}/assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="{{url('admin')}}/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{url('admin')}}/assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
    <link href="{{url('admin')}}/assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="{{url('admin')}}/assets/vendors/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" />
    <link href="{{url('admin')}}/assets/js/datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet">
    <!-- THEME STYLES-->
    <link href="{{url('admin')}}/assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    <script src="{{url('admin')}}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>

</head>

<body class="fixed-navbar has-animation fixed-layout">

    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.html">
                    <span class="brand">Carro
                        <!-- <span class="brand-tip"> Admin</span> -->
                    </span>
                    <span class="brand-mini">C</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="{{url('admin')}}/assets/img/admin-avatar.png" />
                            <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item disabled" href="javascript:;"><i class="fa fa-support"></i>Support</a>

                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item disabled" href="login.html"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="{{url('admin')}}/assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">John</div><small>Administrator</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li class="heading">FEATURES</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Appointment</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('admin.appointment.index')}}"><i class="fa fa-list" aria-hidden="true"></i>
                                     List</a>
                            </li>
                            <li>
                                <a href="{{route('admin.appointment.add')}}"><i class="fa fa-plus" aria-hidden="true"></i>
                                     Add</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-car"></i>
                            <span class="nav-label">Car</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('admin.car.index')}}"><i class="fa fa-list" aria-hidden="true"></i>
                                     List</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-industry"></i>
                            <span class="nav-label">WorkShop</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('admin.workshop.index')}}"><i class="fa fa-list" aria-hidden="true"></i>
                                     List</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
           <!-- START PAGE CONTENT-->
            @yield('content')
            <!--  END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2020 © <b>Carro</b> - All rights reserved.</div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>

    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->

    <script src="{{url('admin')}}/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{url('admin')}}/assets/vendors/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/jquery-knob/dist/jquery.knob.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
    <script src="{{url('admin')}}/assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>

    <!-- CORE SCRIPTS-->
    <script src="{{url('admin')}}/assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{url('admin')}}/assets/js/scripts/form-plugins.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
            });
        });

        $(".alert").fadeTo(5000, 1000).slideUp(1000, function(){
            $(".alert").slideUp(1000);
        });
    </script>
</body>

</html>
