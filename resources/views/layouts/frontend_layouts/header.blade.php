<?php
    use App\Http\Controllers\Controller;
    $catelogy = Controller::catelogy();
?>

<header id="header">
    <!--header-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url('home')}}"><img src="{{asset('assets/frontend_assets/images/home/logo.png')}}" alt="" /></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{url('cart')}}">
                                    <i class="fa fa-shopping-cart"></i> Cart
                                    <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                                </a>
                            </li>
                            @if(Auth::check())
                            <li class="dropdown" ><a href="" onclick="return false"><i class="fa fa-user"></i> {{Auth::guard('web')->user()->name}}</a>
                                <ul role="menu" class="sub-menu">
                                    <li ><a href="{{url('user/change-password')}}">Change Password</a></li>
                                    <li ><a href="{{url('user/logout')}}">Logout</a></li>
                                </ul>
                            </li>
                            @else <li><a href="{{url('user/login')}}"><i class="fa fa-user"></i>Login</li>
                            @endif
                            <!-- <li><a href="{{url('user/login')}}"><i class="fa fa-user"></i>                             
                            @if(Auth::user()) {{Auth::user()->name}}                                                        
                            @else Login
                            @endif
                            </a></li>
                            <li><a href="{{url('user/logout')}}"><i class="fas fa-registered"></i> Logout</a></li> -->
                            <li><a href="{{url('user/register')}}"><i class="fas fa-registered"></i> Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/home')}}">Home</a></li>
                            <li class="dropdown"><a href="" onclick="return false">Catelogy<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($catelogy as $catelogy)
                                    <li><a href="{{url('/catelogy/'.$catelogy->slug_name)}}">{{$catelogy->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->
