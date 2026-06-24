<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insertOrIgnore([
            [
                'name' => 'hawi',
                'email' => 'muhammadbaihaqi1401@gmail.com',
                'role_id' => 1,
                'password' => Hash::make('hawi123'),
                'phone' => '089524137502',
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
             [
                'name' => 'Pak Heri',
                'email' => 'berkahillahi0043@gmail.com',
                'role_id' => 1,
                'password' => Hash::make('Bayu_222004'),
                'phone' => '089524137502',
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);

    }
}
