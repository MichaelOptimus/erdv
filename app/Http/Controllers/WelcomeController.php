<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller {
    
    public function index() {
        
        if(Auth::user()->profil === 'admin') {
            return redirect('/admin');
        } elseif (Auth::user()->profil === 'gestion') {
            return redirect('/gestion');
        } elseif (Auth::user()->profil === 'patient') {
           return redirect('/');
        }

    }
}
