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
        return $this->hasMany(PackageItem::class);
    }

    public function getTotalAttribute()
    {
        return $this->items->reduce(function ($carry, $item) {
            return $carry + ($item->price * $item->amount);
        }, 0);
    }
}
