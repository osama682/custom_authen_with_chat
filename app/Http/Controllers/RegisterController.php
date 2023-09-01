<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }
    public function add(Request $request){
        User::create([
           'name'=> $request['name'],
           'email'=> $request['email'],
            'password'=> bcrypt($request['password']),
        ]);

//        $user = new User();
//        $user->name = $request['name'];
//        $user->email = $request['email'];
//        $user->password = bcrypt($request['password']);
//        $user->save();

        return redirect()->route('dashboard');
    }

    public function dashboard(){
        return view('dashboard');
    }
}
