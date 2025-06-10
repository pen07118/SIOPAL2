<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VGA extends Model
{
    protected $fillable = [
        'brand',
        'type',
        'memory',
        'stock'
    ];
    protected $table = 'vgas';
}
