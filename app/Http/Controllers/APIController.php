<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller {
    

    public function getCliniques() {
        $data = [];
        $cliniques = DB::table('cliniques')->get();
        foreach ($cliniques as $key) {
           $spec = DB::table('specialites')->where('clinique', $key->id)->get();
           $key->specialites = $spec;

           $data[] = $key;
        }
        return $data;
    }

    public function registerPatient(Request $request) {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'datenaissance' => ['required'],
            'genre' => ['required'],
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
            'profil' => 'patient',
        ]);
        return $user;
    }
}
