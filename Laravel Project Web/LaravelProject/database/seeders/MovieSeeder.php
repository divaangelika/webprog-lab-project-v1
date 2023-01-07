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
                'title'=>'Charlie\'s Angels',
                'description'=>'A team of female private agents, popularly known as Charlies Angels, are tasked by their mysterious boss to expose an international conspiracy to weaponise an energy conservation device.',
                'genre'=>'Actiom, Comedy',
                'actors'=>'Elizabeth Banks, Kristen Stewart, Ella Balinska Naomi Scott',
                'director'=>'Elizabeth Banks',
                'releaseDate'=>'2019-8-13',
                'imgThumbnail'=>'https://upload.wikimedia.org/wikipedia/en/2/2a/Charlie%27s_Angels_%28Official_2019_Film_Poster%29.png',
                'imgBackground'=>'https://mmc.tirto.id/image/2019/11/15/film-charlies-angels--1_ratio-16x9.jpg'
            ],
            [
                'id'=>'3',
                'title'=>'Avatar: The Way of Water',
                'description'=>'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Navi race to protect their home',
                'genre'=>'Adventure',
                'actors'=>'Zoe Saldaña, Sam Worthington, Sigourney Weaver, Michelle Rodriguez',
                'director'=>'James Cameron',
                'releaseDate'=>'2022-12-18',
                'imgThumbnail'=>'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSmGggtpJ4TX3aN3PUaVWUgNODHespRPvKYAyhGUAZSqSOmPiEm',
                'imgBackground'=>'https://w0.peakpx.com/wallpaper/965/851/HD-wallpaper-avatar-2-2018-poster-fantasy-movie-avatar-2-navi-blue.jpg'
            ],
        ])->each(function ($movie)
        {
            DB::table('movies')->insert($movie);
        });
    }
}
