<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
  protected $table = 'users';
  protected $fillable = [
        'email', 'password','reset_token','reset_token_expiry'
    ];

}
