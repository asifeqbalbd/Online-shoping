<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    public function get_reg(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    protected $fillable = [
        'subcategory_name',
        'category_id',
    ];
}
