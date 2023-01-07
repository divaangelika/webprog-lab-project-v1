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
                'imgBackground'=>'https://ic.c4assets.com/brands/mission-impossible-fallout/c7be71e7-9968-4b38-8f01-c64a70bf9480.jpg?interpolation=progressive-bicubic&output-format=jpeg&output-quality=90{&resize}'
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
            [
                'id'=>'3',
                'title'=>'Avatar: The Way of Water',
                'description'=>'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Navi race to protect their home',
                'genre'=>'Adventure',
                'actors'=>'Zoe Saldaña, Sam Worthington, Sigourney Weaver, Michelle Rodriguez',
                'director'=>'James Cameron',
                'releaseDate'=>'2022-12-18',
                'imgThumbnail'=>'https://m.media-amazon.com/images/M/MV5BYjhiNjBlODctY2ZiOC00YjVlLWFlNzAtNTVhNzM1YjI1NzMxXkEyXkFqcGdeQXVyMjQxNTE1MDA@._V1_.jpg',
                'imgBackground'=>'https://w0.peakpx.com/wallpaper/965/851/HD-wallpaper-avatar-2-2018-poster-fantasy-movie-avatar-2-navi-blue.jpg'
            ],
        ])->each(function ($movie)
        {
            DB::table('movies')->insert($movie);
        });
    }
}
