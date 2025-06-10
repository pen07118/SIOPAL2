<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Headphone extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'stock'
    ];

    protected $table = 'headphones';
}
