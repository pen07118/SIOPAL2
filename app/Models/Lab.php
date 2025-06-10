<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'lab_name',
        'floor'
    ];

    protected $table = 'labs';
}
