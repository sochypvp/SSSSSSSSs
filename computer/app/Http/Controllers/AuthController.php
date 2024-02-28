<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response([
            'message' => 'registered',
            'success' => true,
            'user' => $user
        ]);
    }
    public function loginApi(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();

        if(!$user){
            return response([
                'meesage' => 'login successfully',
                'success' => false
            ]);
        }

        if(Hash::check($request->password,$user->password)){
            $access_token = $user->createToken('authToken')->plainTextToken;
            return response([
                'meesage' => 'login successfully',
                'success' => true,
                'user' => $user,
                'token' => $access_token
            ]);
        }
    }public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();

        if(!$user){
            return response([
                'meesage' => 'login successfully',
                'success' => false
            ]);
        }

        if(Hash::check($request->password,$user->password)){
            // return response([
            //     'meesage' => 'login successfully',
            //     'success' => true,
            //     'user' => $user,
            // ]);
            $login = [
                'meesage' => 'login successfully',
                'success' => true,
                'user' => $user,
            ];
            return view('home',['user' => $login]);
        }
    }

    public function getData(){
        $user = User::all();
        return response($user);
    }
}
