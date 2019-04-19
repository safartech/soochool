<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Crypto Dashboard - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/modern/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('modern/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/vendors/css/extensions/toastr.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/plugins/extensions/toastr.css') }}">
    <!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
    @yield('css')
    <style>
        .select2{
            width: 100% !important;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/style.css') }}">
<!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<!-- fixed-top-->
@include('layouts.navbars.modern.main')

<!-- ////////////////////////////////////////////////////////////////////////////-->

@include('layouts.sidebars.modern.main')


<div class="app-content content" id="app">
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
</footer>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{asset('js/momentjs/moment.js')}}"></script>
<script src="{{ asset('js/select2/js/select2.min.js') }}" type="module"></script>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('assets/modern/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('assets/modern/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('assets/modern/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/modern/js/core/app.js') }}"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('assets/modern/js/scripts/pages/dashboard-crypto.js') }}"></script>
<!-- END PAGE LEVEL JS-->

@yield('js')
</body>
</html>