@extends('layouts.admin_layouts.index')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Catelogy</h5>
        <div class="table-responsive">
            @if(session('success_messenger'))
            <div class="alert alert-success">{{session('success_messenger')}}</div>
            @endif
            @if(session('error_messenger'))
            <div class="alert alert-danger">{{session('error_messenger')}}</div>
            @endif
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catelogy as $cate)
                    <tr>
                        <td>{{$cate->id}}</td>
                        <td>{{$cate->name}}</td>
                        <td>{{$cate->slug_name}}</td>
                        <td>
                            <a href="{{url('admin/edit-catelogy/'.$cate->id)}}" class="btn btn-cyan btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm"
                                data-toggle="modal" data-target="#Modal2{{$cate->id}}">Delete</a>
                            <div class="modal fade" id="Modal2{{$cate->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$cate->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete catelogy?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                            <a href="{{url('admin/delete-catelogy/'.$cate->id)}}"><button type="button"
                                                    class="btn btn-danger">Delete</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
