<header id="header" class="header_normal">
    <div class="header_wrapper">
        <div class="container">
            <div class="header_menu">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="img/site-logo.png" alt="site-logo"></a>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul class="d-flex" id="main_nav">
                    <li class="nav-item"><a href="{{ route('/')}}" class="{{ (request()->is('/*')) ? 'active' : '' }} ">Home</a></li>
                    <li class="nav-item"> <a href="{{ route('About')}}" class="{{ (request()->is('About*')) ? 'active' : '' }} ">About</a></li>
                    <li class="nav-item"><a href="{{ route('Portfolio')}}" class="{{ (request()->is('Portfolio*')) ? 'active' : '' }} ">Portfolio</a></li>
                    <li class="nav-item"><a href="{{ route('Contact')}}" class="{{ (request()->is('Contact*')) ? 'active' : '' }} ">Contact</a></li>
                </ul>
            </nav>
             <button class="navbar-btn d-lg-none" type="button">
                <span class="icofont-navigation-menu"></span>
            </button>
            </div>
            
<!--      Mobile Menu-->
            
             <div class="mobile-nav">
                <ul>
                    <li><a class="active" href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/About')}}">About</a> </li>
                    <li><a href="{{url('/Portfolio')}}">Portfolio</a></li>
                    <li><a href="{{url('/Contact')}}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

  <!-- End  Mobile Menu-->