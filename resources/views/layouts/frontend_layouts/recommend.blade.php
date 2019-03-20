<?php
    use App\Http\Controllers\Controller;
    $randomProduct1 = Controller::recommend_product1();
    $randomProduct2 = Controller::recommend_product2();
?>

<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">recommend product</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($randomProduct1 as $randomProduct1)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{url('product/'.$randomProduct1->id)}}"><img height="200px" src="{{asset('upload/product/'.$randomProduct1->image)}}" alt="" /></a>
                                <h2>{{number_format($randomProduct1->price, 0, ',', '.')}}đ</h2>
                                <p>{{$randomProduct1->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="item">
                @foreach($randomProduct2 as $randomProduct2)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{url('product/'.$randomProduct2->id)}}"><img height="200px" src="{{asset('upload/product/'.$randomProduct2->image)}}" alt="" /></a>
                                <h2>{{number_format($randomProduct2->price, 0, ',', '.')}}đ</h2>
                                <p>{{$randomProduct2->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
