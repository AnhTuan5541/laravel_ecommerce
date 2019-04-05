<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Catelogy;
use App\Type;
use App\ProductImage;
use Session;
use Auth;

class FrontendController extends Controller
{
    public function getHome(){
        $productAll = Product::orderBy('id', 'DESC')->paginate(12);
        return view('home', ['productAll'=>$productAll]);
    }

    public function catelogyDetails($slug_name){
        //Display 404 if is not have catelogy
        // $countCatelogy = Catelogy::where('slug_name', $slug_name)->count();
        // if($countCatelogy == 0){
        //     return view('errors.404');
        // }
        $catelogyDetails = Catelogy::where('slug_name', $slug_name)->first();
        //$productAll = $catelogyDetails->product; This way is ok bat it can't use paginate
        //get type by catelogy
        $typeByCate = Type::where('idCatelogy', $catelogyDetails->id)->get();
        
        //save idType in a array
        foreach($typeByCate as $typeByCate){
            $idType[] = $typeByCate->id;
        }

        //take all product in catelogy
        $productAll = Product::whereIn('idType', $idType)->orderBy('id', 'DESC')->paginate(12);
        
        return view('catelogyDetails', ['productAll'=>$productAll, 'catelogyDetails'=>$catelogyDetails]);
    }
    
    public function typeDetails($slug_name){
        //Display 404 if is not have type
        // $countType = Type::where('slug_name', $slug_name)->count();
        // if($countType == 0){
        //     return view('errors.404');
        // }
        $typeDetails = Type::where('slug_name', $slug_name)->first();
        // $productAll = $typeDetails->product;
        $productAll = Product::where('idType', $typeDetails->id)->orderBy('id', 'DESC')->paginate(12);
        
        return view('typeDetails', ['productAll'=>$productAll, 'typeDetails'=>$typeDetails]);
    }

    public function productDetails($id){
        $productDetails = Product::find($id);
        return view('productDetails', ['productDetails'=>$productDetails]);
    }

    public function addToCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getCart(){
        if(!Session::get('cart')){
            return view('cart', ['items' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart',['items' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }

    public function reduceCart($id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) >0 ){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        
    }

    public function removeItems($id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItems($id);
        if(count($cart->items) >0 ){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
    }

    public function register(Request $req){
        if($req->isMethod('post')){

        }
        return view('register');
    }

    public function login(Request $req){
        if($req->isMethod('post')){
            if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password ])){
                if(Session::has('cart')) {
                    return redirect('check-out');
                }
                return redirect('home');
            }
            else{
                return redirect('login')->with('error_messenger', 'Email or Password is not correct');
            }
        }
        return view('login');
    }

    public function logout(){
        Auth::guard('web')->logout();
        Session::forget('cart');        
        return redirect()->back();
    }
}
