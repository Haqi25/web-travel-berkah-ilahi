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
        DB::table('users')->insertOrIgnore([
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
             ],
            [
            'name' => 'Jason Statham',
            'role_id' => 3,
            'email' => 'jason@gmail.com',
            'password' => Hash::make('hawi123'),
            'phone' => '081234567893',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Lewis Hamilton',
            'role_id' => 3,
            'email' => 'lewis.h@gmail.com',
            'password' => Hash::make('hawi123'),
            'phone' => '081234567894',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Max Verstappen',
            'role_id' => 3,
            'email' => 'max.v@gmail.com',
            'password' => Hash::make('hawi123'),
            'phone' => '081234567895',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Michael Schumacher',
            'role_id' => 3,
            'email' => 'schumi@gmail.com',
            'password' => Hash::make('hawi123'),
            'phone' => '081234567896',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Ken Block',
            'role_id' => 3,
            'email' => 'kenblock@gmail.com',
            'password' => Hash::make('hawi123'),
            'phone' => '081234567897',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
    ]);
    }
}
