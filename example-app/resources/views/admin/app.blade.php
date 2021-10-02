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
    <link rel="stylesheet" href="{{asset('css/fontawsome_all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminFontend')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.dataTables.min.css')}}">


</head>
<body class="fix-header fix-sidebar">
   
    @include('admin.menu')



    @yield('content')



    </div>
    </div>

    <!-- JavaScript Plugins -->
    <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.smooth-scroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>

    <!-- Bootstrap js -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mdb-5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sidebarmenu.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fontawsome_all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <!-- Main js -->
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.min-2.js')}}"></script>

    @yield('script')

</body>
</html>