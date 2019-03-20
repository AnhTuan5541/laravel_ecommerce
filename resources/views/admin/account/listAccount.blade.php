@extends('layouts.admin_layouts.index')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Account</h5>
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
                        <th>Email</th>
                        <th>Account</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($account as $account)
                    <tr>
                        <td>{{$account->id}}</td>
                        <td>{{$account->name}}</td>
                        <td>{{$account->email}}</td>
                        <td>@if($account->account ==1) admin
                            @else user
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm"
                                data-toggle="modal" data-target="#Modal2{{$account->id}}">Delete</a>
                            <div class="modal fade" id="Modal2{{$account->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$account->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete account?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                            <a href="{{url('admin/delete-account/'.$account->id)}}"><button type="button"
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
