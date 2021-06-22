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
                $user = @auth()->user()->name;
                $record = @$model->name;
                event(new LogEvent(auth()->id(), "New Record ($record) Created by - $user", $model->getOriginal(), $model));
            }
        });

        static::updated(function ($model) {
            if (auth()->check()) {
                $user = @auth()->user()->name;
                $record = @$model->name;
                event(new LogEvent(auth()->id(), "A Record ($record) Updated by - $user", $model->getOriginal(), $model));
            }
        });

        static::deleted(function ($model) {
            if (auth()->check()) {
                $user = @auth()->user()->name;
                $record = @$model->name;
                event(new LogEvent(auth()->id(), "A Record ($record) Deleted by - $user", $model->getOriginal(), $model));
            }
        });
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
