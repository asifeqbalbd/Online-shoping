<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    function product(){
        return $this->belongsTo('App\product', 'product_id');
    }
}
