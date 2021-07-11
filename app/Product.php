<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable =[
        'category_id',
        'subcategory_id',
        'product_name',
        'product_summary',
        'product_description',
        'product_price',
        'product_quantity',
        'product_thumbnail',
    ];

    public function get_Category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function get_SubCategory(){
        return $this->belongsTo('App\SubCategory', 'subcategory_id');
    }
}
