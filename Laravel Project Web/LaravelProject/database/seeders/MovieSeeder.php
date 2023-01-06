<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'id'=>'1',
                'title'=>'test',
                'description'=>'asd',
                'genre'=>'asd',
                'actors'=>'ads',
                'director'=>'ads',
                'releaseDate'=>'2020-12-12',
                'imgThumbnail'=>'ads',
                'imgBackground'=>'ads'
                ]
        ])->each(function ($movie)
        {
            DB::table('movies')->insert($movie);
        });
    }
}
