<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionDay extends Model
{
    protected $fillable = [
        'massage_session_id',
        'massage_id',
        'massage_type',
        'day',
        'start_time',
    ];

    protected $dates = [
        'day',
    ];

    public function session()
    {
        return $this->belongsTo(MassageSession::class);
    }
}
