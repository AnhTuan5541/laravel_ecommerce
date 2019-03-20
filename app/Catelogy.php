<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catelogy extends Model
{
    protected $table = 'catelogies';

    public function type(){
        return $this->hasMany('App\Type', 'idCatelogy', 'id');
    }
    public function product(){
        return $this->hasManyThrough('App\Product', 'App\Type', 'idCatelogy', 'idType', 'id');
    }
}
