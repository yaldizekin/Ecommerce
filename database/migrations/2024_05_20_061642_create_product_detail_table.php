<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned()->unique();
            $table->boolean('show_slider')->default(0);
            $table->boolean('deal_of_day')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('bestseller')->default(0);
            $table->boolean('discounted')->default(0);
            $table->string('product_img');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail');
    }
};
