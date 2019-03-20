<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Catelogy;
use App\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function catelogy(){
        $catelogy = Catelogy::all();
        return $catelogy;
    }


    public static function recommend_product1(){
        //Recommended Product        
        $randomProduct1 = Product::where('status', 1)->inRandomOrder()->take(3)->get();
        return $randomProduct1;
    }

    public static function recommend_product2(){
        //Recommended Product        
        $randomProduct2 = Product::where('status', 1)->inRandomOrder()->take(3)->get();
        return $randomProduct2;
    }
}
