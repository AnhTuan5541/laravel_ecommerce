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
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/admin_assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                @if(Auth::guard('web')->user())
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> {{Auth::guard('web')->user()->name}}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{url('/setting')}}"><i class="ti-settings m-r-5 m-l-5"></i> Change password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{url('/logout')}}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                                @endif
                                </div>
                            </li> -->
                            <li><a href="{{url('user/login')}}"><i class="fa fa-user"></i>                             
                            @if(Auth::user()) {{Auth::user()->name}}                            
                            @else 
                            Login
                            @endif 
                            </a></li>
                            <li><a href="{{url('user/logout')}}"><i class="fas fa-registered"></i> Logout</a></li>
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
