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

    public function addProductPage()
    {
        return view('addMovie');
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre_id' => 'required',
            'director' => 'required',
            'releaseDate' => 'required',
            'imgThumbnail' => 'required|mimes:jpeg,jpg,png',
            'imgBackground' => 'required|mimes:jpeg,jpg,png'
        ]);

        $image = $request->file('imgThumbnail');
        $imageThumbnail = $image->hashName();
        $image->storeAs('/public/pictures/product', $imageThumbnail);

        $image = $request->file('imgBackground');
        $imageBackground = $image->hashName();
        $image->storeAs('/public/pictures/product', $imageBackground);

        Movie::insert([
            'name' => $request->nameProduct,
            'category_id' => $request->categoryProduct,
            'detail' => $request->detailProduct,
            'price' => $request->priceProduct,
            'imgThumbnail' => $imageThumbnail,
            'imgBackground' => $imageBackground
        ]);
        return redirect()->route('');
    }


}
