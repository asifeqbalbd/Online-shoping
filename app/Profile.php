<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'address',
        'sammary',
        'copyright',
        'logo',
    ];
}
