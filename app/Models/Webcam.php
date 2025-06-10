<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webcam extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'stock'
    ];
}
