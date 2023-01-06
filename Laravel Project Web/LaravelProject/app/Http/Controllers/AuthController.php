<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login.login');
    }

    public function loginMember(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');


        if($request->remember){
            Cookie::queue('email_cookie', $email, 2);
            Cookie::queue('password_cookie', $password, 2);
        }

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        //check isi
        // dd($credentials);

        if (Auth::attempt($credentials, $request->remember)){
            Session::put('credentials_session', $credentials);

            if (Auth::user()->role == 'admin') {
                return redirect('/homeAdmin');
            }else{
                return redirect('/homeMember');
            }

        }

        return redirect('/login')->withErrors(['Invalid email or password.']);
    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function registerPage()
    {
        return view('register.register');
    }

    public function registerMember(Request $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $conpassword = $request->conpassword;



        $this->validate($request, [
            'username' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'conpassword' => 'required|same:password',

        ]);

        User::create([
            'username' => $username,
            'email' => $email,
            "password" => bcrypt($password),
            "conpassword" => bcrypt($conpassword)
        ]);

        $credentials = [
            "email" => $email,
            "password" => $password
        ];

        //check isi
        // dd($credentials);

        // Login
        if (Auth::attempt($credentials, true)) {

            $request->session()->put('credentials_session', $credentials);
            return redirect("/homeMember");
        }

        return "fail";
    }
}
