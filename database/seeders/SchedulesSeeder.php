<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            
                'route_id' => 1,
                'driver_id' => 1,
                'vehicle_id' => 3,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at'=> Carbon::now(),
                'updated_at' => Carbon::now()
            
            ]);
    }
}
