<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
   protected $table = 'basket';
   
   protected $guarded=[];

   
   public function Order() {
      return $this->hasOne('App\Models\Order');
      
  }
}
