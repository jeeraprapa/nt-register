<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NT โทรคมนาคมแห่งชาติ</title>
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        @font-face {
            font-family: 'NT';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/NTRegular.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'NT';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/NTBold.ttf') }}") format('truetype');
        }
    </style>
</head>
<body>
<div id="wrapper" class="flex-center">
    <div class="container">
        @yield('content')
    </div>
</div>
@include('_modals')
</body>
</html>