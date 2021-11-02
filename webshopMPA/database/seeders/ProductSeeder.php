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
                'image' => 'https://images4.alphacoders.com/707/thumb-1920-707865.jpg',
                'price' => 19.99
            ],[
                'name' => 'Battlefield 2042',
                'description' => 'test description Battlefield 2042',
                'image' => 'https://lh3.googleusercontent.com/proxy/VlGvZoYvU5XwUHS7CgEqBjR8xwofPnjySdlX1wiBxx5yedaWO-YOE7ged2pSYf_0fRNkzje_ag5Z3aKZ0VEpPXtz57Tm7smKXsThfzVfiCxdlMh-JHx5hhhjetqBE2brz4kb_zFiElM30mZuCgA',
                'price' => 59.99
            ],[
                'name' => 'The Witcher 3: Wild Hunt',
                'description' => 'test description The Witcher 3: Wild Hunt',
                'image' => 'https://c4.wallpaperflare.com/wallpaper/832/348/967/the-witcher-3-wild-hunt-video-games-wallpaper-preview.jpg',
                'price' => 29.99
            ],[
                'name' => 'Deathloop',
                'description' => 'test description Deathloop',
                'image' => 'https://images7.alphacoders.com/110/thumb-1920-1105296.jpg',
                'price' => 59.99
            ],[
                'name' => 'New World',
                'description' => 'test description New World',
                'image' => 'https://wallpapercave.com/wp/wp6369200.jpg',
                'price' => 39.99
            ]   
        ]);
    }
}
