<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PSU extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'spec',
        'year',
        'stock'
    ];

    protected $table = 'psus';
}
