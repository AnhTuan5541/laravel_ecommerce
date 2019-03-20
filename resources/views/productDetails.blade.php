@extends('layouts.frontend_layouts.index')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.frontend_layouts.sidebar')

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product ">
                            <div class="easyzoom easyzoom--with-thumbnails easyzoom--adjacent">
                                <a href="{{asset('upload/product/'.$productDetails->image)}}">
                                    <img width="330px" height="350px" id="mainImage" src="{{asset('upload/product/'.$productDetails->image)}}"
                                        alt="" />
                                </a>
                            </div>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active thumbnails">
                                    @foreach($productDetails->product_image as $productImage)

                                    <a href="{{asset('upload/product_images/'.$productImage->image)}}" data-standard="{{asset('upload/product_images/'.$productImage->image)}}">
                                        <img class="changeImage"  src="{{asset('upload/product_images/'.$productImage->image)}}">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <!--/product-information-->
                            <img src="{{asset('assets/frontend_assets/images/product-details/new.jpg')}}" class="newarrival"
                                alt="" />
                            <h2>{{$productDetails->name}}</h2>
                            <p>{{$productDetails->description}}</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
                                <span>{{number_format($productDetails->price, 0, ',', '.')}}đ</span>
                                <a href="{{url('add-to-cart/'.$productDetails->id)}}" type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </a>
                            </span>
                            <p><b>Availability:</b> @if($productDetails->status ==1) Stocking
                                @else Out of Stock
                                @endif</p>
                            <p><b>Condition:</b> New</p>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <!-- Category-tab and recommend products -->
                @include('layouts.frontend_layouts.recommend')

            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    
    var $easyzoom = $('.easyzoom').easyZoom();


    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function (e) {
        var $this = $(this);
        e.preventDefault();

        api1.swap($this.data('standard'), $this.attr('href'));
    });

    $('.changeImage').click(function () {
        var image = $(this).attr('src');
        $('#mainImage').attr('src', image);
    })

</script>
@endsection
