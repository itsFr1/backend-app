<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $connection = 'mongodb';

    protected $collection = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token',
    ];

    protected $hidden = [
        'password',
        'api_token',
    ];
}