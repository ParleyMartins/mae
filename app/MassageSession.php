<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MassageSession extends Model
{
    protected $fillable = [
        'client_id',
        'anamnese_id',
        'package_id',
        'status',
    ];

    public function client()
    {
        $this->belongsTo(Client::class);
    }

    public function anamnese()
    {
        $this->belongsTo(Anamnese::class);
    }

    public function days()
    {
        $this->hasMany(SessionDay::class);
    }

    public function session()
    {
        return $this->morphTo();
    }

    public function isPackage()
    {
        return $this->session_type == 'App\Package';
    }
}
