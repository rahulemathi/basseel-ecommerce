<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class defaultLogin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('Admin@123')
        ]);

        DB::table('users')->insert([
            'name' => 'ram',
            'email'=>'ram@gmail.com',
            'role' => 'seller',
            'password' => Hash::make('ram@123')
        ]);
    }
}
