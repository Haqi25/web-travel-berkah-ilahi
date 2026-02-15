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
        DB::table('routes')->insert([
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
            ]
            ]);
    }
}
