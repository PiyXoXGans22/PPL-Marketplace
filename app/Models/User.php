<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'login';  
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'password',
        'role_id'
    ];

    protected $hidden = [
        'password',
    ];
}
