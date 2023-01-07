<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomepageController extends Controller
{
    public function load_homepage()
    {
        $homepage_var = Movie::all();
        return view('homepage.homepage', ['hp'=> $homepage_var, 'caro' => $homepage_var->take(3)]);
    }
}
