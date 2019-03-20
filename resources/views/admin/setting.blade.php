@extends('layouts.admin_layouts.index')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Setting</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Setting</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{--Kiểm tra lỗi--}}
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </div>
                @endif
                {{-- In thông báo--}}
                @if(session('success_messenger'))
                    <div class="alert alert-success" >{{session('success_messenger')}}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger ">{{session('error')}}</div>
                @endif
                <form class="form-horizontal" method="post" action="{{url('admin/setting')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                    @if(Auth::user())
                        <h3 class="card-title text-center">Admin: {{Auth::user()->name}}</h3>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="new_pwd" placeholder="New Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="confirm_pwd" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="border-top">
                        <div class="card-body text-right">
                            <button type="submit" class="btn btn-primary">Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
