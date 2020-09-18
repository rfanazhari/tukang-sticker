<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name'  => 'Sticker', 'permalink' => 'sticker'],
            ['name'  => 'Cutting Sticker', 'permalink' => 'cutting-sticker'],
            ['name'  => 'X-Banner', 'permalink' => 'x-banner'],
            ['name'  => 'Neon Box', 'permalink' => 'neon-box'],
            ['name'  => 'Billboard', 'permalink' => 'billboard'],
            ['name'  => 'Textiles', 'permalink' => 'textiles'],
            ['name'  => 'Wallpaper', 'permalink' => 'wallpaper'],
            ['name'  => 'T-Shirt', 'permalink' => 't-shirt'],
        ]);

        // php artisan db:seed --class=ProductsSeeder
    }
}
