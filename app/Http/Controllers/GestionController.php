<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialite;
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
            'genre' => ['required', 'string'],
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

    public function getSpecialites() {
        $user = Auth::user();
        $spec = DB::table('specialites')->where('clinique', $user->clinique)->get();
        // var_dump($spec); die;
       return view('gestion.specialite.liste', ['specialites' => $spec]); 
    }

    public function storeSpecialite(Request $request) {
        $userCon = Auth::user();
        $request->validate([
            'libelle' => ['required', 'string', 'max:255'],
        ]);

        $spec = Specialite::create([
            "libelle" => $request->libelle,
            "clinique" => $userCon->clinique
        ]);

        return redirect()->route('listeSpecialite')->with('message', 'Nouvelle spécialité ajoutée');
    }


    public function editGestionnaire($id) {
        $user = DB::table('users')->where('id', $id)->get();
        return view('gestion.user.edit-user', ['user' => $user[0]]);
    }

    public function updateGestion(Request $request, $id) {

          $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'datenaissance' => ['required'],
            'genre' => ['required'],
        ]);

        $user = DB::table("users")
        ->where('id', $id)
        ->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'datenaissance' => $request->datenaissance,
            'genre' => $request->genre,
        ]);

        $userSelected = DB::table('users')->where('id', $id)->get();
        return redirect()->route('edit-gestionnaire', $id)->with('message', 'Mise à jour effectuée avec succès');
    }
}
