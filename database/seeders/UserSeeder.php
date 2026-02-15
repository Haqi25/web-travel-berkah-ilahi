<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Yoga Maulana',
                'role_id' => 1,
                'email' => 'yogapanjen@gmail.com',
                'password' => Hash::make('hawi123'),
                'phone' =>   '081234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                
            ],
            [
                 'name' => 'Alvian Mustofa',
                'role_id' => 2,
                'email' => 'alvianzipur@gmail.com',
                'password' => Hash::make('hawi123'),
                 'phone' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                
            ],
             [
                'name' => 'Vin Diesel ',
                'role_id' => 3,
                'email' => 'vindieselz@gmail.com',
                'password' => Hash::make('hawi123'),
                 'phone' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ]);
    }
}
