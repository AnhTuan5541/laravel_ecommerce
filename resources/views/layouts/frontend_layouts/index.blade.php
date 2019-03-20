<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('css/frontend_css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('css/frontend_css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('css/frontend_css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/frontend_css/easyzoom.css')}}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/frontend_assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/frontend_assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/frontend_assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/frontend_assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/frontend_assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	@include('layouts.frontend_layouts.header')
	
	@yield('content')
	
	@include('layouts.frontend_layouts.footer')

    <script src="{{ asset('js/frontend_js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/frontend_js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/frontend_js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('js/frontend_js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('js/frontend_js/easyzoom.js')}}"></script>
    <script src="{{ asset('js/frontend_js/all.min.js')}}"></script>    
    <script src="{{ asset('js/frontend_js/main.js')}}"></script>
    @yield('script')
</body>
</html>