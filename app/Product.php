<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function type(){
        return $this->belongsTo('App\Type', 'idType', 'id');
    }

    public function order(){
        return $this->belongsTo('App\Order', 'idOrder', 'id');
    }

    public function product_image(){
        return $this->hasMany('App\ProductImage', 'idProduct', 'id');
    }
}
