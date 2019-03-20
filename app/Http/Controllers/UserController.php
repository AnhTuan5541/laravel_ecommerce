<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use App\Cart;
use App\Order;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function checkOut(Request $req){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if($req->isMethod('get')){
            return view('checkOut',['items' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
        }
        $order = new Order();
        $order->cart = serialize($cart);
        $order->customer_name = $req->customer_name;
        $order->address = $req->address;
        $order->phone = $req->phone;
        Auth::guard('web')->user()->order()->save($order);
        
        Session::forget('cart');
        return view('buySuccess')->with('success_messenger', 'Buy product successfully');
    }

    
}
