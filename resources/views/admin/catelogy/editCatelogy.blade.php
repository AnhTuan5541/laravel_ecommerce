@extends('layouts.admin_layouts.index')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Catelogy: {{$catelogy->name}}</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">EditCatelogy</li>
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
                <form class="form-horizontal" method="post" action="{{url('admin/edit-catelogy/'.$catelogy->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="form-group row">
                            
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" value="{{$catelogy->name}}" required>
                            </div>
                        </div>
                    </div>    
                    <div class="border-top">
                        <div class="card-body text-right">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
