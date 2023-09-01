<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(){
        return view('login');
    }

    public function add(Request $request){
        $email = $request['email'];
        $password = $request['password'];
        $users = User::all();

        foreach ($users as $user){
            if ($user->email === $email && Hash::check($password, $user->password)){
                session(['user' => $user]);
                return redirect()->route('dashboard');
//                return view('dashboard',['users'=>$users]);
            }
        }
            return redirect()->route('login')->withErrors([
                'message_key' => 'Invalid Credentials',
            ]);


    }

    public function logout(){
        session()->forget('user');
        return redirect()->route('login');
    }
}
