<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insertOrIgnore([
            [
                'plate_number' => 'DA1234AA',
                'capacity' => 6,
                'name' => 'Toyota Avanza Veloz',
                'image' => 'mobil.jpeg'
            ],
            
            [
                'plate_number' => 'DA5678BB',
                'capacity' => 6,
                'name' => 'Daihatsu Xenia',
                'image' => 'mobil.jpeg'        
            ],
            [
                'plate_number' => 'DA123891',
                'capacity' => 4,
                'name' => 'Mitsubishi Expander',
                'image' => 'mobil.jpeg'
            ],
            [
                'plate_number' => 'DAHUHUHU',
                'capacity' => 8,
                'name' => 'Innova Reborn',
                'image' => 'mobil.jpeg'
            ],
            [
                'plate_number' => 'DA872UIO',
                'capacity' => 9,
                'name' => 'Ertiga',
                'image' => 'mobil.jpeg'
            ], 
            [
               'plate_number' => 'DA8129HJK',
               'capacity' => 4,
               'name' => 'Honda Mobilio',
               'image' => 'mobil.jpg'
            ], 
            [
                'plate_number' => 'DA78127HJ',
                'capacity' => 8,
                'name' => 'Confero',
                'image' => 'mobil.jpeg'
            ]
            ]);
    }
}
