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
        DB::table('schedules')->insertOrIgnore([

            [
                'route_id' => 1,
                'driver_id' => 1,
                'vehicle_id' => 3,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'route_id' => 2,
                'driver_id' => 2,
                'vehicle_id' => 2,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'route_id' => 3,
                'driver_id' => 3,
                'vehicle_id' => 4,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'route_id' => 4,
                'driver_id' => 4,
                'vehicle_id' => 4,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'route_id' => 5,
                'driver_id' => 5,
                'vehicle_id' => 5,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'route_id' => 6,
                'driver_id' => 6,
                'vehicle_id' => 6,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'route_id' => 7,
                'driver_id' => 2,
                'vehicle_id' => 7,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'route_id' => 8,
                'driver_id' => 4,
                'vehicle_id' => 6,
                'departure_time' => Carbon::now()->addDay(),
                'available_seat' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]

        ]);
    }
}
