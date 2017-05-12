<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blob extends Model
{
    protected $fillable = [
        'gpgldb',
    ];

    public function database()
    {
        return $this->belongsTo(Database::class);
    }
}
