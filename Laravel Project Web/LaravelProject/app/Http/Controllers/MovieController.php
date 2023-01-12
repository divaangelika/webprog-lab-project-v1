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
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;

class MovieController extends Controller
{
    public function home()
    {
        $movies = Movie::all();

        $genres = Genre::all();

        foreach ($movies as $movie) {
            $movie->releaseDate = substr($movie->releaseDate, 0, 4);
        }

        $popularMovies = Movie::with('watchlist')
            ->leftjoin('watchlists', 'movie_id', '=', 'movies.id')
            ->select('movies.id', 'title', 'releaseDate', 'img_thumbnail', DB::raw('COUNT(movie_id) as watchlistCount'))
            ->groupBy('movies.id', 'title', 'releaseDate', 'img_thumbnail')
            ->orderBy('watchlistCount', 'DESC')
            ->get();

        foreach ($popularMovies as $popularMovie) {
            $popularMovie->releaseDate = substr($popularMovie->releaseDate, 0, 4);
        }

        $moviesRandom = Movie::all()->random(3);

        $movieGenres = MovieGenre::all();

        // dd($moviesRandom);

        foreach ($moviesRandom as $movieRandom) {
            $movieRandom->releaseDate = substr($movieRandom->releaseDate, 0, 4);
        }
        return view('homepage.homepage', compact('movies', 'genres', 'moviesRandom', 'movieGenres', 'popularMovies'));
    }

    public function addMoviePage()
    {
        $movie = null;
        $genres = Genre::all();
        $actors = Actor::all();
        return view('admin.editMovie', compact('genres', 'actors', 'movie'));
    }

    public function editMoviePage($id)
    {
        $movie = Movie::find($id);
        $movieGenres = MovieGenre::where('movie_id', $id)->get();
        $movieActors = MovieActor::where('movie_id', $id)->get();
        $genres = Genre::all();
        $actors = Actor::all();
        return view('admin.editMovie', compact('genres', 'actors', 'movie', 'genreMovies', 'movieActors'));
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
            'releaseDate' => 'required',
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
            'releaseDate' => $request->releaseDate,
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
            'releaseDate' => 'required',
            'img_thumbnail' => 'required | mimes:jpeg,png,jpg,gif',
            'img_banner' => 'required | mimes:jpeg,png,jpg,gif',
        ]);

        // $imageThumbnail = $request->file('img_thumbnail');
        // Storage::putFileAs('/public/imgBg/', $imageThumbnail, $imageThumbnail->getClientOriginalName());
        $extImg = $request->img_banner->getClientOriginalExtension();
        $imgName = 'test-'.time().".".$extImg;

        $path = $request->img_banner->move('imgBg', $imgName);
        // echo "path $path <br>";

        // $newPath = asset('imgBg/'.$imgName);
        // echo "new path <a href = '$newPath'>$newPath</a>";


        // $imageBanner = $request->file('img_banner');
        // Storage::putFileAs('/public/imgBg/', $imageBanner, $imageBanner->getClientOriginalName());

        // dd($request->all());

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->releaseDate = $request->releaseDate;
        $movie->img_thumbnail = $imageThumbnail->getClientOriginalName();
        $movie->img_background = $path;
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
                ->select('movies.id', 'title', 'releaseDate', 'img_thumbnail')
                ->where('title', 'LIKE', "%$request->title%")
                ->where('genre_id', 'LIKE', "%$request->genre%")
                ->join('genre_movies', 'movie_id', '=', 'movies.id')
                ->groupBy('movies.id', 'title', 'releaseDate', 'img_thumbnail')
                ->orderBy('releaseDate', 'desc')
                ->get();
        } else if ($request->sort == "ascending") {
            $movies = Movie::with('genremovie')
                ->select('movies.id', 'title', 'releaseDate', 'img_thumbnail')
                ->where('title', 'LIKE', "%$request->title%")
                ->where('genre_id', 'LIKE', "%$request->genre%")
                ->join('genre_movies', 'movie_id', '=', 'movies.id')
                ->groupBy('movies.id', 'title', 'releaseDate', 'img_thumbnail')
                ->orderBy('title', 'asc')
                ->get();
        } else if ($request->sort == "descending") {
            $movies = Movie::with('genremovie')
                ->select('movies.id', 'title', 'releaseDate', 'img_thumbnail')
                ->where('title', 'LIKE', "%$request->title%")
                ->where('genre_id', 'LIKE', "%$request->genre%")
                ->join('genre_movies', 'movie_id', '=', 'movies.id')
                ->groupBy('movies.id', 'title', 'releaseDate', 'img_thumbnail')
                ->orderBy('title', 'desc')
                ->get();
        } else {
            $movies = Movie::with('genremovie')
                ->select('movies.id', 'title', 'releaseDate', 'img_thumbnail')
                ->where('title', 'LIKE', "%$request->title%")
                ->where('genre_id', 'LIKE', "%$request->genre%")
                ->join('genre_movies', 'movie_id', '=', 'movies.id')
                ->groupBy('movies.id', 'title', 'releaseDate', 'img_thumbnail')
                ->get();
        }

        $genres = Genre::all();

        foreach ($movies as $movie) {
            $movie->releaseDate = substr($movie->releaseDate, 0, 4);
        }

        $popularMovies = Movie::with('watchlist')->leftjoin('watchlists', 'movie_id', '=', 'movies.id')
            ->select('movies.id', 'title', 'releaseDate', 'img_thumbnail', DB::raw('COUNT(movie_id) as watchlistCount'))
            ->groupBy('movies.id', 'title', 'releaseDate', 'img_thumbnail')
            ->orderBy('watchlistCount', 'DESC')
            ->get();

        foreach ($popularMovies as $popularMovie) {
            $popularMovie->releaseDate = substr($popularMovie->releaseDate, 0, 4);
        }

        $moviesRandom = Movie::all()->random(3);

        $movieGenres = MovieGenre::all();

        foreach ($moviesRandom as $movieRandom) {
            $movieRandom->releaseDate = substr($movieRandom->releaseDate, 0, 4);
        }
        return view('home', compact('movies', 'genres', 'moviesRandom', 'genreMovies', 'popularMovies'));
    }

    public function movieDetail($id)
    {
        $movie = Movie::find($id);
        $movie->img_background = "storage/banner/" . $movie->img_background;
        $movie->releaseDate = substr($movie->releaseDate, 0, 4);

        $genres = MovieGenre::where('movie_id', $id)->get();

        $actors = MovieActor::where('movie_id', $id)->get();

        $movies = Movie::where('id', '!=', $id)->get();
        foreach ($movies as $mov) {
            $mov->releaseDate = substr($mov->releaseDate, 0, 4);
        }
        return view('homepage.movieDetail', compact('movie', 'genres', 'actors', 'movies'));
    }

    public function deleteMovie($id){
        $movie = Movie::find($id);
        if (isset($movie)) {
            $movie->delete();
        }
        return redirect('/');
    }


}
