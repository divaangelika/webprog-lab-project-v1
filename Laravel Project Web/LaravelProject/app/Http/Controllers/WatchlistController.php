<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function searchWatchlist(Request $request){
        if($request->search){
            $movies = Watchlist::with('movie')
                        ->where('user_id',Auth::user()->id)
                        ->where('title','LIKE',"%$request->search%")
                        ->join('movies','movie_id','=','movies.id')
                        ->paginate(4);
        }else if($request->status){
            if($request->status=='all') $request->status='';
            $movies = Watchlist::with('movie')
                        ->where('user_id',Auth::user()->id)
                        ->where('status','LIKE',"%$request->status%")
                        ->join('movies','movie_id','=','movies.id')
                        ->paginate(4);
        }else{
            $movies = Watchlist::where('user_id',Auth::user()->id,)->paginate(4);
        }
        $selected = $request->status;

        $movies->appends([
            'title'=>$request->search,
        ]);

        return view('watchlist',compact('movies','selected'));
    }

    public function changeStatus(Request $request,$id){
        $movie = Watchlist::find($id);

        if($request->status == 'remove'){
            $movie->delete();
        }else{
            $movie->update([
                'status'=>$request->status,
            ]);
        }

        return redirect('watchlists');
    }

    public function addWatchList($id){
        $watchlist = new Watchlist();
        $watchlist->user_id = Auth::user()->id;
        $watchlist->movie_id = $id;
        // $watchlist->status = "planning";
        $watchlist->save();
    }

    public function removeWatchList($id){
        Watchlist::where('user_id',Auth::user()->id)->where('movie_id',$id)->delete();
    }
}
