<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'spec',
        'proc_socket',
        'ram_socket',
        'stock'
    ];
}
