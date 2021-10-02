<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>@yield('title')</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb-5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.rprogessbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">


</head>
<body>
   

    @yield('content')



    <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>

    <!-- Bootstrap js -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mdb-5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mixitup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/particles.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/typed.min.js')}}"></script>
        <!-- JavaScript Plugins -->

    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.smooth-scroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
    <!-- Main js -->
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

</body>
</html>