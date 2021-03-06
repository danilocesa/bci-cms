<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\AuditingTrait;

class User extends Authenticatable
{
    use AuditingTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
