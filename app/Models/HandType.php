<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HandType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'ranking'
    ];
}
