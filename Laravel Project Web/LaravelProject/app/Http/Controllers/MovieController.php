<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function loadMovie(){


        $movie_data = Movie::paginate(5);

        if(Auth::user()->role == 'member'){
            return view('member.homeMember', [
                'movie_data' => $movie_data
            ]);
        } else {
            return view('admin.homeAdmin', [
                'movie_data' => $movie_data
            ]);
        }

    }


}
