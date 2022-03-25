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
                'image' => 'https://media.contentapi.ea.com/content/dam/battlefield/battlefield-2042/images/2021/04/k-1920x1080-featured-image.jpg.adapt.crop191x100.1200w.jpg',
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
            ],[
                'name' => 'Dying Light 2',
                'description' => 'test description Dying Light 2',
                'image' => 'https://www.gamekings.tv/wp-content/uploads/Dying-Light-2-gameplay-trailer-over-verhaal-achter-Aiden-1280x720.jpg',
                'price' => 59.99
            ],
        ]);
    }
}
