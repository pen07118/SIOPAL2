<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    protected $fillable = [
        'brand',
        'spec',
        'stock'
    ];
    protected $table = 'vgas';
}
