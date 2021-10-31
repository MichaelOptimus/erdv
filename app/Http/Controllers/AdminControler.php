<?php

namespace App\Http\Controllers;

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
}
