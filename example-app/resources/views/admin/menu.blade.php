    <!-------Start admin menu Section------->
<div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                     <li class="nav-item mt-3">ADMIN DESHBOARD</li>
					</ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item"><a href="{{url('/logout')}}" class="btn btn-sm btn-danger">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                        <li> <a href="{{url('/')}}" ><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Home</span></a></li>
                        <li> <a href="{{url('/visitor')}}" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Visitor</span></a></li>
                    	<li> <a href="{{url('/Skills')}}" ><span> <i class="fas fa-desktop"></i> </span><span class="hide-menu">Skill</span></a></li>
                        <li> <a href="{{url('/services')}}" ><span> <i class="fas fa-desktop"></i> </span><span class="hide-menu">Services</span></a></li>
                        <li> <a href="{{url('/choose')}}" ><span> <i class="fas fa-globe"></i> </span><span class="hide-menu">Choose</span></a></li>
                        <li> <a href="{{url('/testimonial')}}" ><span> <i class="fas fa-globe"></i> </span><span class="hide-menu">Testimonial</span></a></li>
                        <li> <a href="{{url('/count')}}" ><span> <i class="fas fa-calculator"></i> </span><span class="hide-menu">Count</span></a></li>
                        <li> <a href="{{url('/parsonal')}}"><span> <i class="fas fa-user-edit"></i> </span><span class="hide-menu">Parsonal Info</span></a></li>
                        <li> <a href="{{url('/social')}}"><span> <i class="fas fa-people-arrows"></i> </span><span class="hide-menu">Social Link</span></a></li>
                        <li> <a href="{{url('/contact')}}"><span> <i class="far fa-envelope"></i> </span><span class="hide-menu">Contact Msg</span></a></li>
					</ul>
                </nav>
            </div>
        </aside>
<div class="page-wrapper">
