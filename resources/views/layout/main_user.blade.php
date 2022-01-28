<!doctype html>
<html class="no-js" lang="en">

<head>
@include('layout.head')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
			<div class="nalika-profile">
				<div class="profile-dtl">
					<a href="#"><img src="{{asset('template')}}/img/notification/mcb2.png" alt="" /></a>
					<!-- <h2>Pemilik MCB EO</h2> -->
                    <!-- Authentication Links -->
                    @guest
                            <div class="nav-item">
                                <a class="btn btn-primary btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <!-- </div> -->
                            @if (Route::has('register'))
                                <!-- <div class="nav-item"> -->
                                    <a class="btn btn-primary btn-sm" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            @endif
                        @else
                            <div class="nav-item dropdown">
                                <h4 id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </h4>
                                <div class="nav-item">
                                <a class="btn btn-primary btn-sm" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }} 
                                </a>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

				</div>
				<!-- <div class="profile-social-dtl">
					<ul class="dtl-social">
						<li><a href="#"><i class="icon nalika-facebook"></i></a></li>
						<li><a href="#"><i class="icon nalika-twitter"></i></a></li>
						<li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
					</ul>
				</div> -->
			</div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1"> 
                        @include('layout.sidebar_user') 
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper"> <!-- baris -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="/user"><img class="main-logo" width="220px" src="{{asset ('template')}}/img/logo/mcb.png" alt="" /></a>
                        
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2021 <a href="https://colorlib.com/wp/templates/">Wahyu Permana</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
 @include('layout.footer')
</html>