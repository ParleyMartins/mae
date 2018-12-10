<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
    ];

    public function items()
    {
        return $this->belongsToMany(Massage::class);
    }

    public function getTotalAttribute()
    {
        return $this->items->reduce(function ($carry, $item) {
            return $carry + $item->price;
        }, 0);
    }
}
