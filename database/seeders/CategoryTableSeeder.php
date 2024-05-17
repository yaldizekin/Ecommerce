<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->truncate();
       $id = DB::table('category')->insertGetId(['category_name'=>'Elektronik', 'slug'=>'elektronik']);
       DB::table('category')->insert(['category_name'=>'Televizyon', 'slug'=>'televizyon', 'upper_id'=>$id]);
       DB::table('category')->insert(['category_name'=>'Bilgisayar/Tablet', 'slug'=>'bilgisayar-tablet','upper_id'=>$id]);
       DB::table('category')->insert(['category_name'=>'TV ve Ses Sistemleri', 'slug'=>'tv-ses-sistemleri','upper_id'=>$id]);
       DB::table('category')->insert(['category_name'=>'Kamera', 'slug'=>'kamera','upper_id'=>$id]);


        $id = DB::table('category')->insertGetId(['category_name'=>'Kitap', 'slug'=>'kitap']);
        DB::table('category')->insert(['category_name'=>'Edebiyat', 'slug'=>'edebiyat','upper_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Çocuk','slug'=>'cocuk','upper_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Bilgisayar','slug'=>'bilgisayar','upper_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Sınav Hazırlık', 'slug'=>'sinav-hazirlik','upper_id'=>$id]);

        DB::table('category')->insert(['category_name'=>'Dergi', 'slug'=>'dergi']); 
        DB::table('category')->insert(['category_name'=>'Mobilya', 'slug'=>'mobilya']);
        DB::table('category')->insert(['category_name'=>'Dekorasyon', 'slug'=>'dekorasyon']);
        DB::table('category')->insert(['category_name'=>'Kozmetik', 'slug'=>'kozmetik']);
        DB::table('category')->insert(['category_name'=>'Kişisel Bakım', 'slug'=>'kisisel-bakim']);
        DB::table('category')->insert(['category_name'=>'Giyim ve Moda', 'slug'=>'giyim-moda']);
        DB::table('category')->insert(['category_name'=>'Anne ve Çocuk', 'slug'=>'anne-çocuk']);
    }
}
