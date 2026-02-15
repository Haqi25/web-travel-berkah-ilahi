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
        DB::table('vehicles')->insert([
            [
                'plate_number' => 'DA1234AA',
                'capacity' => 6,
            ],
            
            [
                'plate_number' => 'DA5678BB',
                'capacity' => 6            
                ]
            ]);
    }
}
