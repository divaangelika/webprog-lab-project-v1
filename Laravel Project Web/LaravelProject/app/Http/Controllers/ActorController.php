<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Character;
use App\Models\Movie;
use App\Models\MovieActor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    public function actorpage(Request $request)
    {
        $actors = Actor::paginate(10);
        $movieActors = MovieActor::all();
        if ($request->ajax()) {
    		$view = view('actor.actorData',compact('actors','movieActors'))->render();
            return  response()->json(['html'=>$view]);
        }
        return view('actor.actorList', ['actors' => $actors, 'movieActors' => $movieActors]);
    }

    public function actordetail($id)
    {
        $actor = Actor::find($id);
        $movies = movieActor::where('actor_id', $id)->get();
        $movieActors = movieActor::all();
        return view('actor.actorDetail', ['actor' => $actor, 'movies' => $movies, 'characters' => $movieActors,'movies'=>$movies]);
    }

    public function addactorpage()
    {
        return view('actor.addActor');
    }
    public function addactor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | min:3',
            'gender' => 'required',
            'biography' => 'required | min:10',
            'dobActor' => 'required',
            'pobActor' => 'required',
            'imgActor' => 'required | mimes:jpeg,png,jpg,gif',
            'popularity' => 'required | numeric'
        ]);

        $image = $request->file('imgActor');
        Storage::putFileAs('/public/actor/', $image, $image->getClientOriginalName());

        $actor = new Actor();
        $actor->name = $request->name;
        $actor->gender = $request->gender;
        $actor->biography = $request->biography;
        $actor->dobActor = $request->dobActor;
        $actor->pobActor = $request->pobActor;
        $actor->img_url = $image->getClientOriginalName();
        $actor->popularity = $request->popularity;
        $actor->save();
        return redirect('/actors')->with('success', 'Success add actor');
    }

    public function editactorpage($id)
    {
        $actor = DB::table('actors')->where('id', $id)->first();
        return view('actor.editActor', ['actor' => $actor]);
    }

    public function editactor(Request $request, $id)
    {
        $actor = Actor::find($id);

        $validate = $this->validate($request, [
            'name' => 'required | min:3',
            'gender' => 'required',
            'biography' => 'required | min:10',
            'dobActor' => 'required',
            'pobActor' => 'required',
            'imgActor' => 'required | mimes:jpeg,png,jpg,gif',
            'popularity' => 'required | numeric'
        ]);

        $image = $request->file('imgActor');
        Storage::putFileAs('/public', $image, $image->getClientOriginalName());
        Storage::delete('public/' . $actor->img_url);
        $actor->update(
            ['name' => $request->name,
            'gender' => $request->gender,
            'biography' => $request->biography,
            'dobActor' => $request->dobActor,
            'pobActor' => $request->pobActor,
            'img_url' => $image->getClientOriginalName(),
            'popularity' => $request->popularity]);

        return redirect('actors/detail/' . $id)->with('success','Success Update Actor');
    }

    public function deleteactor($id){
        $actor = Actor::find($id);
        if (isset($actor)) {
            $actor->delete();
        }
        return redirect('/actors');
    }

    public function searchactor(Request $request){
        $actors = Actor::where('name', 'LIKE', "%$request->search%")->get();
        $movies = Movie::all();
        $movieActors = movieActor::all();
        return view('actor.actorList', ['actors'=>$actors, 'movies'=>$movies,'characters'=>$movieActors]);
    }
}
