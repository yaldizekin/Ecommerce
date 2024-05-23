<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = "product"; 





    public function categories(){

        return $this->belongsToMany(Category::class);
     
     }

    
     public function detail(){

        return $this->hasOne(ProductDetail::class)->withDefault();
     
     }






}
