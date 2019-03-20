@extends('layouts.frontend_layouts.index')
@section('content')
@if(session('success_messenger'))
<div class="alert alert-success">{{session('success_messenger')}}</div>
@endif
@include('layouts.frontend_layouts.slide')

<section>
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.frontend_layouts.sidebar')
            
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">All Product</h2>
                    @foreach($productAll as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{url('product/'.$product->id)}}"><img height="200px" src="{{asset('upload/product/'.$product->image)}}"
                                            alt="" /></a>
                                    <h2>{{number_format($product->price, 0, ',' , '.')}}đ</h2>
                                    <p>{{$product->name}}</p>
                                </div>
                                <div class="modal fade" id="Modal{{$product->id}}" tabindex="-1" role="dialog"
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
                                                Are you sure to add product to cart ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                <a href="" class= "addToCart" idProduct="{{$product->id}}"><button type="button"
                                                        class="btn btn-success">Add</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination justify-content-center">
                    {!! $productAll->links() !!}
                </div>
                <!--features_items-->

                <!-- Category-tab and recommend products -->
                @include('layouts.frontend_layouts.recommend')

            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $('.addToCart').click(function (e) {
        e.preventDefault();
        var idProduct = $(this).attr('idProduct');
        //var qty = $('#qty'+idItem).val();
        var qty = 1;
        $.ajax({
            url: 'add-to-cart/' + idProduct + '/' + qty,
            success: function(){
                window.location.reload();
            }
        });
    });
</script>
@endsection