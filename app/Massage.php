<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
    ];
}
