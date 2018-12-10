<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionDay extends Model
{
    protected $fillable = [
        'massage_session_id',
        'massage_id',
        'day',
    ];

    protected $dates = [
        'day',
    ];

    public function session()
    {
        return $this->belongsTo(MassageSession::class);
    }

    public function massage()
    {
        return $this->belongsTo(Massage::class);
    }
}
