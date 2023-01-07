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
                'title'=>'Mission: Impossible - Fallout',
                'description'=>'Ethan Hunt and the IMF team join forces with CIA assassin August Walker to prevent a disaster of epic proportions.',
                'genre'=>'Action/Thriller',
                'actors'=>'Tom Cruise, Rebecca Ferguson, Simon Pegg',
                'director'=>'Christopher McQuarrie',
                'releaseDate'=>'2018-7-25',
                'imgThumbnail'=>'https://upload.wikimedia.org/wikipedia/en/f/ff/MI_%E2%80%93_Fallout.jpg',
                'imgBackground'=>'https://footeandfriendsonfilm.com/wp-content/uploads/2018/07/Mission-Impossible-Fallout-Poster-5K.jpg'
                ]
        ])->each(function ($movie)
        {
            DB::table('movies')->insert($movie);
        });
    }
}
