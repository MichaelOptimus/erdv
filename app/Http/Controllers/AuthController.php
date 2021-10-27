<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\User;



class AuthController extends Controller
{
    //Register user
    public function register(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
        'nom'=>'required|string',
        'prenom'=>'required|string',
        'genre'=>'required|string',
        'phone'=>'required|string|min:9|unique:users',
        'datenaissance'=>'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6|confirmed',
        ]);

        //Create user
        $user = User::create([

            'nom'=>$attrs['nom'],
            'prenom'=>$attrs['prenom'],
            'genre'=>$attrs['genre'],
            'phone'=>$attrs['phone'],
            'datenaissance'=>$attrs['datenaissance'],
            'email'=>$attrs['email'],
            'password'=>bcrypt($attrs['password']),
            'profil' => 'patient'
        ]);

        //return user & token in response

        return response([
        'user'=>$user,
        'token'=>$user->createToken('secret')->plainTextToken
        ],200);
    }
     //Login User
    public function login(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
        'phone'=>'required|min:9',
        'password'=>'required|min:6'
        ]);

        //attempt Login
        if(!Auth::attempt($attrs))
        {
            return response([
                'message'=>'Données incorrecte.'
            ],403);
        }
        //return user & token in response
        return response([
            'user'=> auth()->user(),
            'token'=> auth()->user()->createToken('secret')->plainTextToken
        ],200);
    }

    //logout user

    public function logout()
    {
        auth()->user()->token()->delete();
        return response([
            'message' => 'Logout Success.'
        ],200);
    }

    //get user details

    public function user(){
        return response([
            'message' => 'Logout sucess.'
        ],200);
    }
}
