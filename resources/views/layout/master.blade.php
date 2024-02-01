<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your Laravel Project')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('firstproject/img/favicon.png')}}" rel="icon">
    <link href="{{asset('firstproject/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('firstproject/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('firstproject/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('firstproject/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('firstproject/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('firstproject/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('firstproject/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('firstproject/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('firstproject/css/style.css')}}" rel="stylesheet">
</head>
<body>

    {{-- Include the common header --}}
    @include('layout.header')

    {{-- Yield the main content section --}}
    <div id="main">
        @yield('content')
    </div>

    {{-- Include the common footer --}}
    @include('layout.footer')

    <!-- Link your common JS files here -->

</body>
</html>

 