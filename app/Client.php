<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'id_number',
        'phone',
        'email',
        'birthdate',
    ];

    public function sessions()
    {
        return $this->hasMany(MassageSession::class);
    }
}
