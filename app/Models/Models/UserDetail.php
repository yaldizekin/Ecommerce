<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
   protected $table='user_detail';
   public $timestamps=false;
   protected $guarded=[];


   public function user(){
    return $this->belongsTo('App\Models\User');
   }
}
