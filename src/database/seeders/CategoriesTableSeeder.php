<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
/*  */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'content' => '1.商品のお届けについて'],
            ['id' => 2, 'content' => '2.商品の交換について'],
            ['id' => 3, 'content' => '3.商品トラブル'],
            ['id' => 4, 'content' => '4.ショップへのお問い合わせ'],
            ['id' => 5, 'content' => '5.その他'],
        ]);
    }

}
