@extends('layouts.frontend_layouts.index')
@section('content')
@include('layouts.frontend_layouts.slide')


<section>
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.frontend_layouts.sidebar')

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">{{$typeDetails->name}}</h2>
                    @foreach($productAll as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{url('product/'.$product->id)}}"><img height="200px" src="{{asset('upload/product/'.$product->image)}}" alt="" /></a>
                                    <h2>{{number_format($product->price, 0, ',', '.')}}đ</h2>
                                    <p>{{$product->name}}</p>
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
