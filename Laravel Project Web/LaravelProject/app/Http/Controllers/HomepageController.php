<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function load_homepage()
    {
        return view('homepage.homepage');
    }
}
