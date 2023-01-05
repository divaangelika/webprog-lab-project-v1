<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function loadUser(){
        $user_data = DB::table('users')->get();

        return view('profile_member', [
            'user_data' => $user_data
        ]);
    }

    public function showUpdateForm(Request $request){
        $user_data = DB::table('users')->where('id', $request->route('id'))->first();
        return view('update-profile')->with('user_data', $user_data);
    }

    public function update(Request $request){
        DB::table('dramas')->where('id', $request->route('id'))->update([
            'name' => $request->drama_name,
            'description'=> $request->drama_description
        ]);

        return redirect('/');
    }
}
