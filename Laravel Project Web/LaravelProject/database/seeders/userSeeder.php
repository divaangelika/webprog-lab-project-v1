<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'username' => 'admin1',
            ],

            [
                'role' => 'admin',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('admin123'),
                'username' => 'admin1',
            ],

            [
                'role' => 'member',
                'email' => 'sarah@gmail.com',
                'password' => bcrypt('member123'),
                'username' => 'sarah',
            ]
        ]);
    }
}
