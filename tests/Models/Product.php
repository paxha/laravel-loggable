<?php

namespace Loggable\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Loggable\Traits\Loggable;

class Product extends Model
{
    use Loggable;

    protected $fillable = [
        'name',
    ];

    public function getActedUpon()
    {
        return $this->name;
    }
}
