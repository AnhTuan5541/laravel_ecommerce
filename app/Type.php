<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "types";

    public function product(){
        return $this->hasMany('App\Product', 'idType', 'id');
    }

    public function catelogy(){
        return $this->belongsTo('App\Catelogy','idCatelogy','id');
    }
}
