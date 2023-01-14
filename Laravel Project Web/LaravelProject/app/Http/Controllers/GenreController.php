<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieGenre;

class GenreController extends Controller
{
    public static function getGenres($movie_id){
        $genres = MovieGenre::where('movie_id', 'LIKE', "$movie_id")->get();

        return $genres;
    }

    public static function insertGenres($movie_id, $genre_id){
        MovieGenre::create([
            'movie_id' => $movie_id,
            'genre_id' => $genre_id
        ]);
    }
}
