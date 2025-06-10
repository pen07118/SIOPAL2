<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laboran extends Model
{
    protected $fillable = [
        'name',
        'npp',
        'email',
        'password',
        'lab',
        'shift',
        'no_telp'
    ];
}
