<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Các thẻ meta, CSS, và các tài nguyên khác -->
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Cafe House Template')</title>

    <!-- Tài nguyên CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/templatemo-style.css') }}" rel="stylesheet">

    <!-- Font từ Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
    

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon" />

    <!-- phần này là nguồn của cái css của thèn đánh giá sao ấy  -->
    
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/rate.css') }}">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/rate.css') }}" rel="stylesheet">
</head>
<body>
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>

    <!-- Phần header -->
    @include('frontend.layouts.header')

    <!-- Nội dung chính -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Phần footer -->
    @include('frontend.layouts.footer')

    <!-- Các tài nguyên JavaScript -->
   <script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.2.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('frontend/js/templatemo-script.js') }}"></script>
   <script type="text/javascript" src="{{ asset('frontend/js/jquery-1.9.1.min.js') }}"></script>
    
</body>
</html>


