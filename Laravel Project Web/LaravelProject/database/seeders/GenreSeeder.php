<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            ['name' => 'Horror'],
            ['name' => 'Comedy'],
            ['name' => 'Action'],
            ['name' => 'Thriller'],
            ['name' => 'Adventure'],
        ]);
    }
}
