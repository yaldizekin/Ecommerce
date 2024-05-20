<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
 

    use SoftDeletes;
    protected $table ='user';
  
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'activation_code',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'activation_code'
    ];

   
}
