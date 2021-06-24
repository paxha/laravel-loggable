<?php

namespace Loggable\Traits;

use Loggable\Models\Log;

trait HasLogs
{
    public function logs()
    {
        return $this->hasMany(Log::class, 'user_id');
    }

    public function getActor()
    {
        return $this->name;
    }
}
