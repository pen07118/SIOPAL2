<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RAM extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'socket',
        'capacity',
        'stock'
    ];
    protected $table = 'rams';
}
