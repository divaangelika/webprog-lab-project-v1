<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieActor;

class MovieActorController extends Controller
{
    public static function getActors($movie_id){
        $actors = MovieActor::where('movie_id', 'LIKE', "$movie_id")->get();

        return $actors;
    }

    public static function getMovies($actor_id){
        $movie_actor = MovieActor::where('actor_id', 'LIKE', "$actor_id")->get();

        return $movie_actor;
    }

    public static function insertMovieActor($movie_id, $genre_id, $name){
        MovieActor::create([
            'movie_id' => $movie_id,
            'genre_id' => $genre_id,
            'name' => $name
        ]);
    }
}
