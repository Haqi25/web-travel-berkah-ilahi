<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insertOrIgnore([
            [
               'user_id' => 59,
               'license_number' => 'SIM123456789',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
            ],
            [
               'user_id' => 60,
               'license_number' => 'SIM98989138',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 61,
               'license_number' => 'SIM8298923',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 62,
               'license_number' => 'SIM2183139',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
            ],
             [
                'user_id' => 63  ,
               'license_number' => 'SIM1839812',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
             ],
              [
                'user_id' => 64,
               'license_number' => 'SIM8231789',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
            ]
            
            
            ]);

    }
}
