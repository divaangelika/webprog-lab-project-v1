<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function loadMovieMember(){

        $movie_data = DB::table('movies')->get();

        $movie_data = Movie::paginate(5);

        return view('member.homeMember', [
            'movie_data' => $movie_data
        ]);

    }

    public function loadMovieAdmin(){

        $movie_data = DB::table('movies')->get();

        $movie_data = Movie::paginate(5);

        return view('admin.homeAdmin', [
            'movie_data' => $movie_data
        ]);

    }
}
