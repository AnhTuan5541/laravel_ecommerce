@extends('layouts.admin_layouts.index')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add Image Product</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">AddImageProduct</li>
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
                <div class="alert alert-success">{{session('success_messenger')}}</div>
                @endif
                @if(session('error_messenger'))
                <div class="alert alert-danger">{{session('error_messenger')}}</div>
                @endif
                <form class="form-horizontal" method="post" action="{{url('admin/add-product-image/'.$product->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Type:</label>
                            <label for="lname" class="col-sm-7 control-label col-form-label"><strong>{{$product->type->name}}</strong></label>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Product:</label>
                            <label for="lname" class="col-sm-7 control-label col-form-label"><strong>{{$product->name}}</strong></label>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Image:</label>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="form-control-file" name="image[]" id="image" multiple="multiple">
                                    <!-- <input type="hidden" name="current_image" value="{{$product->image}}"> -->
                                    <!-- <input type="file" class="custom-file-input" id="validatedCustomFile" required name="image">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div> -->
                                </div>
                                <!-- <img width="590px" src="upload/product/{{$product->image}}" alt=""> -->
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body text-right">
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </div>
                    </div>
                </form>
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product (ID={{$product->id}})</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->product_image as $productImage)
                        <tr>
                            <td>{{$productImage->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>
                                <img width="150px" src="{{asset('upload/product_images/'.$productImage->image)}}" alt="">
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal2{{$productImage->id}}"
                                    title="Delete Product">Delete</a>
                                <div class="modal fade" id="Modal2{{$productImage->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$productImage->image}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete product image?
                                            </div>
                                            <div class="text-center">
                                                <img width="300px" src="{{asset('upload/product_images/'.$productImage->image)}}" alt="">
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                <a href="{{url('admin/delete-product-image/'.$productImage->id)}}"><button type="button"
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
</div>
@endsection
