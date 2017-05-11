<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $fillable = [
        'name',
        'fingerprint',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
