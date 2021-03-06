<?php

namespace Loggable\Tests\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Loggable\Traits\HasLogs;

class User extends Model implements AuthorizableContract, AuthenticatableContract
{
    use HasFactory;
    use Authorizable;
    use Authenticatable;
    use HasLogs;

    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'remember_token',
    ];

    public function getActor()
    {
        return $this->name;
    }
}
