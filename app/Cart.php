<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    function product(){
        return $this->belongsTo('App\product', 'product_id');
    }

    protected $fillable = [
        'product_quantity',
    ];
}
