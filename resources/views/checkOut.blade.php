@extends('layouts.frontend_layouts.index')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>
        <!--/breadcrums-->
        @if(session('success_messenger'))
            <div class="alert alert-success" >{{session('error_messenger')}}</div>
        @endif
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <!-- <td class="description"></td> -->
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td class="cart_product">
                            <a href="{{url('product/'.$item['item']['id'])}}"><img width=80px heigt=80px src="{{asset('upload/product/'.$item['item']['image'])}}"
                                    alt=""></a>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($item['item']['price'], 0, ',', '.')}}đ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down" idItem="{{$item['item']['id']}}" href=""> - </a>
                                <input class="cart_quantity_input" type="text" name="quantity" id="qty{{$item['item']['id']}} " readonly
                                    value="{{$item['qty']}}" autocomplete="off" size="2">
                                <a class="cart_quantity_up" idItem="{{$item['item']['id']}}" href=""> + </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($item['price'], 0, ',', '.')}}đ</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" idItem="{{$item['item']['id']}}" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right" style="font-size: 20px; color: #FE980F;">
                <strong>Total Price:{{number_format($totalPrice, 0, ',','.')}}đ</strong>
            </div>
        </div>
        @if($totalQty !== 0)
        <div class="shopper-informations">
            <div class="review-payment">
                <h2>Bill to</h2>
            </div>
            <div class="bill-to col-md-6">
                <form class="form-horizontal" method="post" action="{{url('check-out')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body ">
                        <div class="form-group row text-right ">
                            <input type="text" class="form-control" name="customer_name" placeholder="Name*" required value= "{{Auth::guard('web')->user()->name}}"><br>
                            <input type="text" class="form-control" name="address" placeholder="Address*" required value= "{{Auth::guard('web')->user()->address}}"><br>
                            <input type="text" class="form-control" name="phone" placeholder="Phone*" required value= "{{Auth::guard('web')->user()->phone}}"><br>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body text-right ">
                            <button type="submit" class="btn btn-success">Buy</button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
        @endif
    </div>
    </div>
</section>
<!--/#cart_items-->
@endsection
@section('script')
<script>
    $('.cart_quantity_down').click(function (e) {
        e.preventDefault();
        var idItem = $(this).attr('idItem');
        //var qty = $('#qty'+idItem).val();
        $.ajax({
            url: 'reduce-item/' + idItem,
            success: function () {
                window.location.reload();
            }
        });
    });

    $('.cart_quantity_up').click(function (e) {
        e.preventDefault();
        var idItem = $(this).attr('idItem');
        //var qty = $('#qty'+idItem).val();
        $.ajax({
            url: 'add-to-cart/' + idItem,
            success: function () {
                window.location.reload();
            }
        });
    });

    $('.cart_quantity_delete').click(function (e) {
        e.preventDefault();
        var idItem = $(this).attr('idItem');
        //var qty = $('#qty'+idItem).val();
        $.ajax({
            url: 'remove-items/' + idItem,
            success: function () {
                window.location.reload();
            }
        });
    });

</script>
@endsection
