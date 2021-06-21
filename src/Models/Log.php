<?php

namespace Loggable\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id', 'description', 'before', 'after',
    ];

    public function loggable()
    {
        return $this->morphTo();
    }
}