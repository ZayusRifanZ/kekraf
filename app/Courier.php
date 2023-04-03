<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    // protected $guarded = [];

    protected $fillable = [
        'code', 'name'
    ];

    protected $hidden = [];
}
