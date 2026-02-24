<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('routes')->insertOrIgnore([
        [
            'origin' => 'Banjarbaru',
            'destination' => 'Bandara Syamsudin Noor',
            'price' => 100000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'origin' => 'Liang Anggang',
            'destination' => 'Banjarmasin',
            'price' => 150000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
      
        [
            'origin' => 'Banjarmasin',
            'destination' => 'Martapura',
            'price' => 120000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'origin' => 'Martapura',
            'destination' => 'Banjarbaru',
            'price' => 50000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'origin' => 'Banjarmasin',
            'destination' => 'Pelaihari',
            'price' => 200000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'origin' => 'Banjarbaru',
            'destination' => 'Rantau',
            'price' => 250000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'origin' => 'Banjarmasin',
            'destination' => 'Kandangan',
            'price' => 300000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'origin' => 'Martapura',
            'destination' => 'Barabai',
            'price' => 350000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'origin' => 'Banjarbaru',
            'destination' => 'Amuntai',
            'price' => 400000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'origin' => 'Banjarmasin',
            'destination' => 'Tanjung',
            'price' => 500000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
    ]);
}
}
