<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'github',
        'pinterest',
        'linkedin',
    ];
}
