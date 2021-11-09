<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RendezVousController extends Controller {


    public function index() {
        $user = Auth::user();
        $rendezvous = DB::table('rdvs')->where('clinique', $user->clinique)->get();
        foreach ($rendezvous as $key) {
            $user = DB::table('users')->where('id', $key->user)->get();
            $key->user = $user[0];
        }
        foreach ($rendezvous as $key) {
            $specialite = DB::table('specialites')->where('id', $key->specialite)->get();
            $key->specialite = $specialite[0];
        }
        return view('gestion.rendezvous.liste-rendezvous', ['rendezvous' => $rendezvous]);
    }

    public function confirmRdv(Request $request) {

        $rdv = $request->validate([
            'id' => ['required'],
            'date_rdv' => ['required'],
            'heure_rdv' => ['required'],
        ]);
        DB::table("rdvs")
        ->where('id', $rdv['id'])
        ->update([
            'status' => 'confirme',
            'date_rdv' => $rdv['date_rdv'],
            'heure_rdv' => $rdv['heure_rdv']
        ]);

        $user = Auth::user();
        $rendezvous = DB::table('rdvs')->where('clinique', $user->clinique)->get();
        foreach ($rendezvous as $key) {
            $user = DB::table('users')->where('id', $key->user)->get();
            $key->user = $user[0];
        }
        foreach ($rendezvous as $key) {
            $specialite = DB::table('specialites')->where('id', $key->specialite)->get();
            $key->specialite = $specialite[0];
        }
        return redirect()->route('liste-rendezvous', ['rendezvous' => $rendezvous])->with('message', 'Mise à jour effectuée avec succès.');
    }
    
    public function cancelRdv($id) {
        DB::table("rdvs")
        ->where('id', $id)
        ->update([
            'status' => 'annule',
        ]);

        $user = Auth::user();
        $rendezvous = DB::table('rdvs')->where('clinique', $user->clinique)->get();
        foreach ($rendezvous as $key) {
            $user = DB::table('users')->where('id', $key->user)->get();
            $key->user = $user[0];
        }
        foreach ($rendezvous as $key) {
            $specialite = DB::table('specialites')->where('id', $key->specialite)->get();
            $key->specialite = $specialite[0];
        }
        return redirect()->route('liste-rendezvous', ['rendezvous' => $rendezvous])->with('message', 'Mise à jour effectuée avec succès.');
    }
    
    public function doneRdv($id) {
        DB::table("rdvs")
        ->where('id', $id)
        ->update([
            'status' => 'effectue',
        ]);

        $user = Auth::user();
        $rendezvous = DB::table('rdvs')->where('clinique', $user->clinique)->get();
        foreach ($rendezvous as $key) {
            $user = DB::table('users')->where('id', $key->user)->get();
            $key->user = $user[0];
        }
        foreach ($rendezvous as $key) {
            $specialite = DB::table('specialites')->where('id', $key->specialite)->get();
            $key->specialite = $specialite[0];
        }
        return redirect()->route('liste-rendezvous', ['rendezvous' => $rendezvous])->with('message', 'Mise à jour effectuée avec succès.');
    }
}
