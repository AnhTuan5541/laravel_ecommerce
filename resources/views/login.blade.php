@extends('layouts.frontend_layouts.index')
@section('content')
@if(session('success_messenger'))
<div class="alert alert-success">{{session('success_messenger')}}</div>
@endif
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    @if(session('error_messenger'))
                    <div class="alert alert-danger">{{session('error_messenger')}}</div>
                    @endif
                    <h2>Login to your account</h2>
                    <form action="{{url('user/login')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Username"
                            aria-describedby="basic-addon1" name="email" required="">
                        <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password"
                            aria-describedby="basic-addon1" name="password" required="">
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <h2>New User Signup!</h2>
                    <form action="#">
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email Address" />
                        <input type="password" placeholder="Password" />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection
