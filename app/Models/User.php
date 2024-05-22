<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Models\UserDetail;
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

    public function getAuthPassword() {
        return $this->password;
    }
    public function detail(){

        return $this->hasOne(UserDetail::class);
     
     }
   
}
