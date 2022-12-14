<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieActor;
use App\Models\MovieGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    // public function viewMoviePage($movieID)
    // {
    //     return view('movieDetail')
    //         ->with('movie', Movie::findOrFail($movieID));
    // }

    // public function manage(Request $request)
    // {
    //     if ($request->search) {
    //         return view('editMovie')
    //             ->with('products', Movie::where('name', 'like', '%' . $request->search . '%')->get());
    //     } else {
    //         return view('editMovie')
    //             ->with('products', Movie::all());
    //     }
    // }

    // public function addMoviePage(Request $request)
    // {
    //     $genres = Genre::all();
    //     return view('admin.addMovie', ['genres' => $genres]);
    // }

    // public function addMovie(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'genre_id' => 'required',
    //         'director' => 'required',
    //         'releaseDate' => 'required',
    //         'imgThumbnail' => 'required|mimes:jpeg,jpg,png',
    //         'imgBackground' => 'required|mimes:jpeg,jpg,png'
    //     ]);

    //     $image = $request->file('imgThumbnail');
    //     $imageThumbnail = $image->hashName();
    //     $image->storeAs('/public/pictures/imgThumbnail', $imageThumbnail);

    //     $image = $request->file('imgBackground');
    //     $imageBackground = $image->hashName();
    //     $image->storeAs('/public/pictures/imgBackground', $imageBackground);

    //     // dd($request->all());

    //     Movie::insert([
    //         'name' => $request->nameProduct,
    //         'category_id' => $request->categoryProduct,
    //         'detail' => $request->detailProduct,
    //         'price' => $request->priceProduct,
    //         'imgThumbnail' => $imageThumbnail,
    //         'imgBackground' => $imageBackground
    //     ]);
    //     return redirect()->route('');
    // }

    public function index()
    {
        $movies = Movie::all();

        $genres = Genre::all();

        foreach ($movies as $movie) {
            $movie->release_date = substr($movie->release_date, 0, 4);
        }

        $popularMovies = Movie::with('watchlist')
            ->leftjoin('watchlists', 'movie_id', '=', 'movies.id')
            ->select('movies.id', 'title', 'release_date', 'img_thumbnail', DB::raw('COUNT(movie_id) as watchlistCount'))
            ->groupBy('movies.id', 'title', 'release_date', 'img_thumbnail')
            ->orderBy('watchlistCount', 'DESC')
            ->get();

        foreach ($popularMovies as $popularMovie) {
            $popularMovie->release_date = substr($popularMovie->release_date, 0, 4);
        }

        $moviesRandom = Movie::all()->random(3);

        $movieGenres = MovieGenre::all();

        foreach ($moviesRandom as $movieRandom) {
            $movieRandom->release_date = substr($movieRandom->release_date, 0, 4);
        }
        return view('home', compact('movies', 'genres', 'moviesRandom', 'genreMovies', 'popularMovies'));
    }

    public function addMoviePage()
    {
        $movie = null;
        $genres = Genre::all();
        $actors = Actor::all();
        return view('admin.editmovie', compact('genres', 'actors', 'movie'));
    }

    public function editMoviePage($id)
    {
        $movie = Movie::find($id);
        $movieGenres = MovieGenre::where('movie_id', $id)->get();
        $characters = MovieActor::where('movie_id', $id)->get();
        $genres = Genre::all();
        $actors = Actor::all();
        return view('admin.editmovie', compact('genres', 'actors', 'movie', 'genreMovies', 'characters'));
    }

    public function editMovie(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required | min:2 | max:50',
            'description' => 'required | min:8',
            'genre' => 'required|array',
            'actor' => 'required|array',
            'character_name' => 'required|array',
            'director' => 'required | min:3',
            'release_date' => 'required',
            'img_thumbnail' => 'required | mimes:jpeg,png,jpg,gif',
            'img_banner' => 'required | mimes:jpeg,png,jpg,gif',
        ]);

        $imageThumbnail = $request->file('img_thumbnail');
        Storage::putFileAs('/public/poster/', $imageThumbnail, $imageThumbnail->getClientOriginalName());

        $imageBanner = $request->file('img_banner');
        Storage::putFileAs('/public/banner/', $imageBanner, $imageBanner->getClientOriginalName());

        $movie = Movie::find($id);
        $movie->update([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'release_date' => $request->release_date,
            'img_thumbnail' => $imageThumbnail->getClientOriginalName(),
            'img_background' => $imageBanner->getClientOriginalName(),
        ]);
        $movieGenres = MovieGenre::where('movie_id', $id)->get();
        for ($i = 0; $i < sizeof($movieGenres); $i++) {
            $movieGenres[$i]->update([
                'genre_id' => $request->genre[$i],
            ]);
        }
        if (sizeof($movieGenres) < sizeof($request->genre)) {
            for ($i = 0; $i < sizeof($request->genre) - sizeof($movieGenres); $i++) {
                $genreMovie = new MovieGenre();
                $genreMovie->genre_id = $request->genre[sizeof($movieGenres) + $i];
                $genreMovie->movie_id = $id;
                $genreMovie->save();
            }
        }

        $characterMovies = MovieActor::where('movie_id', $id)->get();
        for ($i = 0; $i < sizeof($characterMovies); $i++) {
            $characterMovies[$i]->update([
                'actor_id' => $request->actor[$i],
                'name' => $request->character_name[$i],
            ]);
        }
        if (sizeof($characterMovies) < sizeof($request->actor)) {
            for ($i = 0; $i < sizeof($request->actor) - sizeof($characterMovies); $i++) {
                $characterMovie = new MovieActor();
                $characterMovie->actor_id = $request->actor[sizeof($characterMovies)+$i];
                $characterMovie->movie_id = $id;
                $characterMovie->name = $request->character_name[sizeof($characterMovies)+$i];
                $characterMovie->save();
            }
        }
        return redirect("/movies/detail/$id")->with('success', 'Success edit movie');
    }

    public function addMovie(Request $request)
    {
        $this->validate($request, [
            'title' => 'required | min:2 | max:50',
            'description' => 'required | min:8',
            'genre' => 'required|array',
            'actor' => 'required|array',
            'character_name' => 'required|array',
            'director' => 'required | min:3',
            'release_date' => 'required',
            'img_thumbnail' => 'required | mimes:jpeg,png,jpg,gif',
            'img_banner' => 'required | mimes:jpeg,png,jpg,gif',
        ]);

        $imageThumbnail = $request->file('img_thumbnail');
        Storage::putFileAs('/public/poster/', $imageThumbnail, $imageThumbnail->getClientOriginalName());

        $imageBanner = $request->file('img_banner');
        Storage::putFileAs('/public/banner/', $imageBanner, $imageBanner->getClientOriginalName());

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->release_date = $request->release_date;
        $movie->img_thumbnail = $imageThumbnail->getClientOriginalName();
        $movie->img_background = $imageBanner->getClientOriginalName();
        $movie->save();
        foreach ($request->genre as $genre) {
            $movieGenres = new MovieGenre();
            $movieGenres->genre_id = $genre;
            $movieGenres->movie_id = $movie->id;
            $movieGenres->save();
        }
        for ($i = 0; $i < sizeof($request->actor); $i++) {
            $characterMovie = new MovieActor();
            $characterMovie->actor_id = $request->actor[$i];
            $characterMovie->movie_id = $movie->id;
            $characterMovie->name = $request->character_name[$i];
            $characterMovie->save();
        }
        return redirect('/movies/addmovie')->with('success', 'Success add movie');
    }

    public function searchMovie(Request $request)
    {
        if ($request->sort == "latest") {
            $movies = Movie::with('genremovie')
                ->select('movies.id', 'title', 'release_date', 'img_thumbnail')
                ->where('title', 'LIKE', "%$request->title%")
                ->where('genre_id', 'LIKE', "%$request->genre%")
                ->join('genre_movies', 'movie_id', '=', 'movies.id')
                ->groupBy('movies.id', 'title', 'release_date', 'img_thumbnail')
                ->orderBy('release_date', 'desc')
                ->get();
        } else if ($request->sort == "ascending") {
            $movies = Movie::with('genremovie')
                ->select('movies.id', 'title', 'release_date', 'img_thumbnail')
                ->where('title', 'LIKE', "%$request->title%")
                ->where('genre_id', 'LIKE', "%$request->genre%")
                ->join('genre_movies', 'movie_id', '=', 'movies.id')
                ->groupBy('movies.id', 'title', 'release_date', 'img_thumbnail')
                ->orderBy('title', 'asc')
                ->get();
        } else if ($request->sort == "descending") {
            $movies = Movie::with('genremovie')
                ->select('movies.id', 'title', 'release_date', 'img_thumbnail')
                ->where('title', 'LIKE', "%$request->title%")
                ->where('genre_id', 'LIKE', "%$request->genre%")
                ->join('genre_movies', 'movie_id', '=', 'movies.id')
                ->groupBy('movies.id', 'title', 'release_date', 'img_thumbnail')
                ->orderBy('title', 'desc')
                ->get();
        } else {
            $movies = Movie::with('genremovie')
                ->select('movies.id', 'title', 'release_date', 'img_thumbnail')
                ->where('title', 'LIKE', "%$request->title%")
                ->where('genre_id', 'LIKE', "%$request->genre%")
                ->join('genre_movies', 'movie_id', '=', 'movies.id')
                ->groupBy('movies.id', 'title', 'release_date', 'img_thumbnail')
                ->get();
        }

        $genres = Genre::all();

        foreach ($movies as $movie) {
            $movie->release_date = substr($movie->release_date, 0, 4);
        }

        $popularMovies = Movie::with('watchlist')->leftjoin('watchlists', 'movie_id', '=', 'movies.id')
            ->select('movies.id', 'title', 'release_date', 'img_thumbnail', DB::raw('COUNT(movie_id) as watchlistCount'))
            ->groupBy('movies.id', 'title', 'release_date', 'img_thumbnail')
            ->orderBy('watchlistCount', 'DESC')
            ->get();

        foreach ($popularMovies as $popularMovie) {
            $popularMovie->release_date = substr($popularMovie->release_date, 0, 4);
        }

        $moviesRandom = Movie::all()->random(3);

        $movieGenres = MovieGenre::all();

        foreach ($moviesRandom as $movieRandom) {
            $movieRandom->release_date = substr($movieRandom->release_date, 0, 4);
        }
        return view('home', compact('movies', 'genres', 'moviesRandom', 'genreMovies', 'popularMovies'));
    }

    public function movieDetail($id)
    {
        $movie = Movie::find($id);
        $movie->img_background = "storage/banner/" . $movie->img_background;
        $movie->release_date = substr($movie->release_date, 0, 4);

        $genres = MovieGenre::where('movie_id', $id)->get();

        $actors = MovieActor::where('movie_id', $id)->get();

        $movies = Movie::where('id', '!=', $id)->get();
        foreach ($movies as $mov) {
            $mov->release_date = substr($mov->release_date, 0, 4);
        }
        return view('movie.moviedetail', compact('movie', 'genres', 'actors', 'movies'));
    }

    public function deleteMovie($id){
        $movie = Movie::find($id);
        if (isset($movie)) {
            $movie->delete();
        }
        return redirect('/');
    }


}
