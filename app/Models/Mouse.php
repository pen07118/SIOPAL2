<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'stock'
    ];

    protected $table = 'mouse';
}
