<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('assets/components/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('assets/components/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('assets/components/Ionicons/css/ionicons.min.css')}}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{asset('assets/components/jvectormap/jquery-jvectormap.css')}}">

        <!--         Morris chart 
                <link rel="stylesheet" href="{{asset('assets/components/morris.js/morris.css')}}">-->

        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('assets/components/select2/dist/css/select2.min.css')}}">

        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="{{asset('assets/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('assets/plugins/iCheck/all.css')}}">


        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/css/AdminLTE.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('assets/css/skins/skin-green.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <!--<link rel="stylesheet" href="{{asset('assets/css/Source_Sans_Pro/css.css')}}">-->
        <!--        <link rel="stylesheet"
                      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->


        <!-- jQuery 3 -->
        <script src="{{asset('assets/components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset('assets/components/bootstrap/dist/js/bootstrap.min.js')}}"></script>


        <!-- DataTables -->
        <link rel="stylesheet"          href="{{asset('assets/components/datatables.net-bs/css/dataTables.bootstrap.css')}}">
        <script type="text/javascript"  src="{{asset('assets/components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript"  src="{{asset('assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


    </head>    
    
    <body class="hold-transition skin-green sidebar-mini">        
        <div class="wrapper">

            <header class="main-header  hidden-print">
                @include('admin.common.topbar')
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar hidden-print">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">                   
                    @include('admin.common.sidebar')

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header hidden-print">
                    <h1>
                        <small>Version 2.0</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>



                <!-- Main content -->
                <section class="content">

                    @yield('adminNotification')

                    @yield('adminContent')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer hidden-print">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->

        </div>
        <!-- ./wrapper -->

        <!-- FastClick -->
        <script src="{{asset('assets/components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('assets/js/adminlte.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('assets/components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap  -->
        <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- SlimScroll -->
        <script src="{{asset('assets/components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!--ChartJS--> 
        <script src="{{asset('assets/components/chart.js/Chart.js')}}"></script>


        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="{{asset('assets/js/pages/dashboard2.js')}}"></script>-->

        <!-- select2 -->
        <script src="{{asset('assets/components/select2/dist/js/select2.full.min.js')}}"></script>
        <!-- bootstrap datepicker -->
        <script src="{{asset('assets/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        <!-- iCheck 1.0.1 -->
        <script src="{{asset('assets/plugins/iCheck/icheck.min.js')}}"></script>


        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <!--<script src="{{asset('assets/js/demo.js')}}"></script>-->
    </body>
</html>