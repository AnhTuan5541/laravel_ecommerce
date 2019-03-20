<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/admin_assets/images/favicon.png">
    <title>Admin</title>
    <base href="{{asset('')}}">
    <!-- Custom CSS -->
    <!-- <link href="assets/admin_assets/libs/flot/css/float-chart.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link href="css/admin_css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets\admin_assets\extra-libs\DataTables\datatables.css">

</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        @include('layouts.admin_layouts.header')
        
        @include('layouts.admin_layouts.sidebar')

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            @yield('content')
            <!-- footer -->
            @include('layouts.admin_layouts.footer')
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <script src="assets/admin_assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/admin_assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/admin_assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/admin_assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!-- <script src="assets/admin_assets/extra-libs/sparkline/sparkline.js"></script> -->
    <!--Wave Effects -->
    <script src="js/admin_js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/admin_js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/admin_js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="js/admin_js/pages/dashboards/dashboard1.js"></script> -->
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <!-- <script src="assets/admin_assets/libs/flot/excanvas.js"></script> -->
    <!-- <script src="assets/admin_assets/libs/flot/jquery.flot.js"></script> -->
    <!-- <script src="assets/admin_assets/libs/flot/jquery.flot.pie.js"></script> -->
    <!-- <script src="assets/admin_assets/libs/flot/jquery.flot.time.js"></script> -->
    <!-- <script src="assets/admin_assets/libs/flot/jquery.flot.stack.js"></script> -->
    <!-- <script src="assets/admin_assets/libs/flot/jquery.flot.crosshair.js"></script> -->
    <!-- <script src="assets/admin_assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script> -->
    <!-- <script src="js/admin_js/pages/chart/chart-page-init.js"></script> -->
    <script src="assets/admin_assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    @yield('script')
</body>

</html>