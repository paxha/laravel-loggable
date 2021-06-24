<?php

namespace Loggable\Traits;

use Loggable\Events\LogEvent;
use Loggable\Models\Log;

trait Loggable
{
    public static function bootLoggable()
    {
        static::created(function ($model) {
            if (auth()->check()) {
                $user = auth()->user()->getActor();
                $actedUpon = $model->getActedUpon();
                event(new LogEvent(auth()->id(), "New Record ($actedUpon) Created by - $user", $model->getOriginal(), $model));
            }
        });

        static::updated(function ($model) {
            if (auth()->check()) {
                $user = auth()->user()->getActor();
                $actedUpon = $model->getActedUpon();
                event(new LogEvent(auth()->id(), "A Record ($actedUpon) Updated by - $user", $model->getOriginal(), $model));
            }
        });

        static::deleted(function ($model) {
            if (auth()->check()) {
                $user = auth()->user()->getActor();
                $actedUpon = $model->getActedUpon();
                event(new LogEvent(auth()->id(), "A Record ($actedUpon) Deleted by - $user", $model->getOriginal(), $model));
            }
        });
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable');
    }

    public function user()
    {
        return $this->belongsTo(config('loggable.model', \App\Models\User::class), 'user_id');
    }

    public function getActedUpon()
    {
        return $this->name;
    }
}
