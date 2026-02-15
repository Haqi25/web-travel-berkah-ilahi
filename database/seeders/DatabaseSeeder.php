<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        //  RoleSeeder::class,
        //  UserSeeder::class,
        //  DriversSeeder::class,
        //  RoutesSeeder::class,
        // VehiclesSeeder::class
        SchedulesSeeder::class
       ]);
    }
}
