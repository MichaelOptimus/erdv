<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminControler extends Controller {
    
    public function index() {
        return view('admin.dashboard');
    }

    public function getAdmins() {
        $admin = DB::table('users')->where('profil', 'admin')->get();
        return view('admin.user.users', ['admins' => $admin]);
    }

    public function newUser() {
        return view('admin.user.newuser');
    }

    public function editUser() {
        return view('admin.user.edituser');
    }


    public function setAdmin(Request $request) {

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
            'profil' => 'admin',
        ]);

        return redirect()->route('listeAdmin');
    }
}
