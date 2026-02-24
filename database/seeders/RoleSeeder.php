<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use function Symfony\Component\String\s;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('roles')->insertOrIgnore([
            [
            'role_name' => 'ADMIN', 
            'description' => 'Admin Travel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now() 
            ],
          
         [
            'role_name' => 'USER',
            'description' => 'Pelanggan Travel',
             'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
 
         ], [
            'role_name' => 'DRIVER',
            'description' => 'Sopir Travel',
             'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]
         ]);
    }
}
