<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ListingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listings')->insert([
            [
                'location' => 'New York',
                'price' => 5000,
                'square_metres' => 50,
                'availability' => 'rent',
                'type' => 'apartment'                
            ],
            [
                'location' => 'London',
                'price' => 6000,
                'square_metres' => 60,
                'availability' => 'sale',
                'type' => 'studio'
            ],
            [
                'location' => 'Paris',
                'price' => 7000,
                'square_metres' => 70,
                'availability' => 'rent',
                'type' => 'loft'                
            ],
            [
                'location' => 'Berlin',
                'price' => 8000,
                'square_metres' => 80,
                'availability' => 'sale',
                'type' => 'maisonette'                
            ],
        ]);
    }
}
