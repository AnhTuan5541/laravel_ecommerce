@extends('layouts.admin_layouts.index')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Product</h5>
        <div class="table-responsive">
            @if(session('success_messenger'))
            <div class="alert alert-success">{{session('success_messenger')}}</div>
            @endif
            @if(session('error_messenger'))
                <div class="alert alert-danger" >{{session('error_messenger')}}</div>
            @endif
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <p>{!!$product->name!!}</p>
                            <img width="80px" src="{{asset('upload/product/'.$product->image)}}" alt="">
                        </td>
                        <td>{{substr($product->description, 0, 20).'...'}}</td>
                        <td>@if($product->status ==1) Stocking
                            @else Out of Stock
                            @endif
                        </td>
                        <td>{{number_format($product->price, 0, ',', '.')}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->type->name}}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal1{{$product->id}}" title="View Detail">View</button>
                            <a href="{{url('admin/edit-product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Edit Product">Edit</a>
                            <a href="{{url('admin/add-product-image/'.$product->id)}}" class="btn btn-info btn-sm" title="Add image">Image</a>
                            <a href="#" class="btn btn-danger btn-sm"
                                data-toggle="modal" data-target="#Modal2{{$product->id}}" title="Delete Product">Delete</a>
                            <div class="modal fade" id="Modal1{{$product->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true ">
                                <div class="modal-dialog" role="document ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$product->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true ">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>ID: {{$product->id}}</p>
                                            <p>Name: {{$product->name}}</p>
                                            <p>Type: {{$product->type->name}}</p>
                                            <p>Catelogy: {{$product->type->catelogy->name}}</p>
                                            <p>Slug Name: {{$product->slug_name}}</p>
                                            <p>Description: {{$product->description}}</p>
                                            <p>Status: @if($product->status ==1) Stocking
                                                @else Out of Stock
                                                @endif</p>
                                            <p>Price: {{$product->price}}</p>
                                            <img width="350px" src="upload/product/{{$product->image}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="Modal2{{$product->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$product->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete product?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                            <a href="{{url('admin/delete-product/'.$product->id)}}"><button type="button"
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
