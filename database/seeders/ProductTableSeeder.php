<?php

namespace Database\Seeders;

use App\Models\Models\ProductDetail;
use App\Models\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\NullableType;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        Product::truncate();
        ProductDetail::truncate();


        for($i=0; $i<30; $i++){
            $product_name = $faker->sentence(2);

           $product= Product::create([
                'product_name' => $product_name,
                'slug' => \Illuminate\Support\Str::slug($product_name),
                'description' => $faker->sentence(20),
                'price' => $faker->randomFloat(3,1,20),
                'category_id'=>null
            ]);

            $detail = $product->detail()->create([
                'show_slider'=>rand(0,1),
                'deal_of_day'=>rand(0,1),
                'featured'=>rand(0,1),
                'bestseller'=>rand(0,1),
                'discounted'=>rand(0,1)
            ]);
        }
    }
}
