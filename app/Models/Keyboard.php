<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'stock'
    ];

    protected $table = 'keyboards';
}
