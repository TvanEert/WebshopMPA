<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Dead by Daylight',
                'description' => 'test description dbd',
                'price' => 19.99
            ],[
                'name' => 'Battlefield 2042',
                'description' => 'test description Battlefield 2042',
                'price' => 59.99
            ],[
                'name' => 'The Witcher 3: Wild Hunt',
                'description' => 'The Witcher 3: Wild Hunt',
                'price' => 29.99
            ],[
                'name' => 'Deathloop',
                'description' => 'test description Deathloop',
                'price' => 59.99
            ],[
                'name' => 'New World',
                'description' => 'test description New World',
                'price' => 39.99
            ]   
        ]);
    }
}
