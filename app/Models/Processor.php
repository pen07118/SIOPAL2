<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'spec',
        'socket',
        'year',
        'stock'
    ];
}
