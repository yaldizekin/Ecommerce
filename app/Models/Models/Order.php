<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table ='order';

    protected $guarded;


    public function Basket() {
        return $this->belongsTo('App\Models\Basket');
        
    }
}
