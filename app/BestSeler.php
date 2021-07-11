<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BestSeler extends Model
{
    public function get_Category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function get_SubCategory(){
        return $this->belongsTo('App\SubCategory', 'subcategory_id');
    }
}
