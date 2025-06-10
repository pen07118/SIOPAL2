<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = [
        'brand',
        'size',
        'resolution',
        'spec',
        'stock'
    ];

    protected $table = 'monitors';
}
