<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageItem extends Model
{
    protected $fillable = [
        'massage_id',
        'package_id',
        'price',
        'duration',
        'amount',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function massage()
    {
        return $this->belongsTo(Massage::class);
    }

    public function getPriceAttribute()
    {
        return $this->price ?: $this->massage->price;
    }

    public function getDurationAttribute()
    {
        return $this->duration ?: $this->massage->duration;
    }
}
