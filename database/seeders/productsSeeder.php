<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'product_name' => $faker->words(2, true),
                'product_description' => $faker->paragraph,
                'product_image' => 'product' . rand(1, 5) . '.jpg', 
                'stock_quantity' => $faker->numberBetween(10, 100),
                'product_category' => $faker->word,
                'product_price' => $faker->randomFloat(2, 10, 100),
            ]);
        }
    }
}
