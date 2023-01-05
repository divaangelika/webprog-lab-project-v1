<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage() {
        return view('login');
    }

    public function login(Request $request) {
        $crendentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if($request->remember){
            //jika rememberme dicentang maka buat cookie yang disimpan buat 5 menit
            Cookie::queue('mycookie', $request->email, 5);
        }
        //remember token -> tambahin parameter true
        if(Auth::attempt($crendentials, true)){
            // session
            Session::put('mysession', $crendentials);
            return redirect()->back();
        }
        return 'fail';
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function adminPage(){
        return view('admin');
    }
}
