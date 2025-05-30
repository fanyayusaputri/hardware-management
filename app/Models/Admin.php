<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['username', 'password', 'token'];

    protected $hidden = ['password', 'remember_token'];
}
