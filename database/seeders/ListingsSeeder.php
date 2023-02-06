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


// In order to use this seeder to use directly the excel file to import the seeding data, firstly you have to install the PhpOffice/PhpSpreadsheet library
//using composer and provide the path to the excel file


// use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use PhpOffice\PhpSpreadsheet\IOFactory;

//class ListingsTableSeeder extends Seeder
//{
//    public function run()
//    {
//       $spreadsheet = IOFactory::load('path/to/excel/file.xlsx');
//       $worksheet = $spreadsheet->getActiveSheet();
//        $rows = $worksheet->toArray();
//
//        foreach ($rows as $row) {
//            DB::table('listings')->insert([
//               'type' => $row[1],
//               'availability' => $row[2],
//               'location' => $row[3],
//               'square_metres' => $row[4],
//               'price' => $row[5],
//            ]);
//        }
//    }
//}
