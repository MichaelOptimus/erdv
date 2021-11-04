<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GestionController extends Controller {

    public function index() {
        return view('gestion.dashboard');
    }

    public function getUsers() {
        $user = Auth::user();
        $users = DB::table('users')->where('clinique', $user->clinique)->get();
        return view('gestion.user.users', ['users' => $users]);
    }

    public function newUser() {
        return view('gestion.user.newuser');
    }

    public function setGestionnaire(Request $request) {
        $userCon = Auth::user();
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'datenaissance' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'email' => $request->email,
            'genre' => $request->genre,
            'datenaissance' => $request->datenaissance,
            'password' => bcrypt($request->password),
            'profil' => 'gestion',
            'clinique' => $userCon->clinique,
        ]);

        return redirect()->route('listeGestion')->with('message', 'Nouveau gestionnaire ajouté');
    }
}
