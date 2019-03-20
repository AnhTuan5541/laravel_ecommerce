@extends('layouts.admin_layouts.index')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Product</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">EditProduct</li>
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
                <form class="form-horizontal" method="post" action="{{url('admin/edit-product/'.$product->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Catelogy</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control" style="width: 100%; height:36px;" name="idCatelogy" id="idCatelogy"
                                    required>
                                    @foreach($catelogy as $catelogy)
                                    <option value="{{$catelogy->id}}" @if($catelogy->id == $product->type->idCatelogy) selected @endif > {{$catelogy->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Type</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control" style="width: 100%; height:36px;" name="idType" id="type"
                                    required>
                                    @foreach($type as $type)
                                    <option value="{{$type->id}}" @if($type->id == $product->idType) selected @endif > {{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{$product->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                            <div class="col-sm-7">
                                <!-- <textarea name="description" id="description" required></textarea> -->
                                <textarea name="description" id="description" cols="80" rows="10">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                            <div class="col-sm-7">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input " id="customControlValidation1" name="status" value="1"
                                    @if($product->status == 1) {{'checked'}}
                                    @endif
                                    >
                                    <label class="custom-control-label" for="customControlValidation1">Stocking</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input " id="customControlValidation2" name="status" value="0"
                                    @if($product->status == 0) {{'checked'}}
                                    @endif
                                    >
                                    <label class="custom-control-label" for="customControlValidation2">Out of Stock</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Price</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="price" id="price" min="0" placeholder="Product Price" value="{{$product->price}}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Quantity</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="quantity" id="quantity" min="0" placeholder="Quantity" value="{{$product->quantity}}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Image</label>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                <input type="file" class="form-control-file" name="image">
                                <input type="hidden" name="current_image" value="{{$product->image}}">
                                    <!-- <input type="file" class="custom-file-input" id="validatedCustomFile" required name="image">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div> -->
                                </div>
                                <img width="590px" src="upload/product/{{$product->image}}" alt="">
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
@section('script')
<script>
    $('#idCatelogy').change(function(){
        var idCatelogy = $(this).val();
        $.get('admin/getTypeByCatelogy/'+idCatelogy, function(data){
            $('#type').html(data);
        });
    });

    // $('#price').keyup(function (event) {
    //     // skip for arrow keys
    //     if (event.which >= 37 && event.which <= 40) return;

    //     // format number
    //     $(this).val(function (index, value) {
    //         return value
    //             .replace(/\D/g, "")
    //             .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    //     });
    // });
</script>
@endsection
