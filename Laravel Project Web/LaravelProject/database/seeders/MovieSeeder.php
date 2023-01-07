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
            ],
            [
                'id'=>'2',
                'title'=>'Wednesday',
                'description'=>'Wednesday Addams, a high-school student, finds her brother Pugsley tied up in a locker. She sees a psychic vision of his bullies whom she attempts to kill, resulting in her expulsion.',
                'genre'=>'Fantasy',
                'actors'=>'Jenna Ortega, Christina Ricci, Catherine Zeta-Jones, Luis Guzmán',
                'director'=>'Charles Addams',
                'releaseDate'=>'2022-8-23',
                'imgThumbnail'=>'https://www.picclickimg.com/tcEAAOSw9rVjql7t/2022-Wednesday-Movie-Poster-Jenna-Ortega-The-Addams.webp',
                'imgBackground'=>'https://static1.moviewebimages.com/wordpress/wp-content/uploads/2022/09/wednesday-netflix-poster.jpeg'
            ],
        ])->each(function ($movie)
        {
            DB::table('movies')->insert($movie);
        });
    }
}
