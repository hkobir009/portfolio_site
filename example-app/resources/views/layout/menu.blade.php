<header id="header">
    <div class="header_wrapper">
        <div class="container">
            <div class="header_menu">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="img/site-logo.png" alt="site-logo"></a>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul class="d-flex" id="main_nav">
                    <li class="nav-item">
                        <a href="{{ route('/')}}" class="{{ (request()->is('/*')) ? 'active' : '' }} ">Home</a>
                    </li>
                    <li class="nav-item"> <a href="{{ route('About')}}" class="{{ (request()->is('About*')) ? 'active' : '' }} ">About</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('Portfolio')}}" class="{{ (request()->is('Portfolio*')) ? 'active' : '' }} ">Portfolio</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('Contact')}}" class="{{ (request()->is('Contact*')) ? 'active' : '' }} ">Contact</a>
                    </li>
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
<div id="particles-js" class="set-bg" data-setbg="img/computer.jpg"></div>
   <div id="hero">
       <div class="hero_img">
           <img src="img/kabir.jpg" alt="">
       </div>
       <div class="hero_text">
           <h1>I'm Humayun Kabir</h1>
           <h3> Expert in <span class="animate"></span></h3>
           <div class="hero_social">
            <a href="{{url('https://www.facebook.com/jewel.kobir.75')}}" target="_blank"><i class="icofont-facebook"></i></a>
            <a href="{{url('https://twitter.com/hkobir4519')}}" target="_blank"><i class="icofont-twitter"></i></a>
            <a href="{{url('https://www.instagram.com/hkobir009')}}" target="_blank"><i class="icofont-instagram"></i></a>
            <a href="{{url('https://github.com/hkobir009')}}" target="_blank"><i class="icofont-github"></i></a>
           </div>
           <div class="scroll_mouse">
               <a href="#skill"><span class="mouse"></span></a>
           </div>
       </div>
   </div>
   