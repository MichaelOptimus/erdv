<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clinique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CliniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $cliniques = DB::table('cliniques')->get();
        return view('admin.clinique.cliniques', ['cliniques' => $cliniques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clinique.add-clinique');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // return $request;
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'addresse' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string'],
        ]);

        $user = Clinique::create([
            'nom' => $request->nom,
            'addresse' => $request->addresse,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return redirect()->route('cliniques')->with('message', 'Nouvelle Clinique ajoutée');
    }

    public function storeUser(Request $request) {
        // return $request;
        $user = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:9'],
            'datenaissance' => ['required'],
            'genre' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'clinique' => ['required', 'string'],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'genre' => $request->genre,
            'email' => $request->email,
            'datenaissance' => $request->datenaissance,
            'password' => $request->password,
            'profil' => 'gestion',
            'clinique' => $request->clinique,
        ]);
        return redirect()->route('clinique', $request->clinique)->with('message', 'Nouveau gestionnaire ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $clinique = DB::table('cliniques')->where('id', $id)->get();
        $gestionnaire = DB::table('users')->where('clinique', $id)->get();
        return view('admin.clinique.clinique-detail', ['clinique' => $clinique[0], 'gestionnaires' => $gestionnaire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
