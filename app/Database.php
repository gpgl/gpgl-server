<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\DatabaseScope;

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

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new DatabaseScope);
    }
}
