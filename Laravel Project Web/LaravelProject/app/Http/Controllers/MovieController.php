<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function viewMoviePage($movieID)
    {
        return view('movieDetail')
            ->with('movie', Movie::findOrFail($movieID));
    }

    public function manage(Request $request)
    {
        if ($request->search) {
            return view('editMovie')
                ->with('products', Movie::where('name', 'like', '%' . $request->search . '%')->get());
        } else {
            return view('editMovie')
                ->with('products', Movie::all());
        }
    }


}
