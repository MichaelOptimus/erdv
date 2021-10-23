<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use App\Models\User;
use App\Models\Clinique;
use Illuminate\Http\Request;

class RdvController extends Controller
{
    // get all rendez-vous

    public function index()
    {
        return response([

            'rendezvous' => Rdv::orderBy('created_at', 'desc')->with('user:id,motif,status')->withCount('cliniques')->get()

        ],200);
    }

    // get single rendezvous
    public function show($id )
    {
        return response([
            'rendezvous' => Rdv::where('id',$id)->withCount('cliniques')->get()
        ],200);
    }

    // create a rendezvous
    public function store(Request $request) {

        //validate fields
        $attrs = $request->validate([
            'motif' => 'required|string',
            'status' => 'required|bool',
            'user_id' => 'required',
            'clinique_id'=>'required',
            'specialite_id' => 'required',
        ]);

        $rendezvous = Rdv::create([
            'motif'=> $attrs['motif'],
            'status'=> $attrs['status'],
            'user_id'=>auth()->user()->id,
            'clinique_id' => $attrs['clinique_id'],
            'specialite_id' => $attrs['specialite_id'],
        ]);

        //for now skip for rendezvous image
        return response([
            'message' => 'Rendez-vous creer avec succés.',
            'rendezvous' =>$rendezvous
        ],200);
    }

    // update a rendezvous
    public function update(Request $request,$id) {

        $rendezvous =Rdv::find($id);
        if(!$rendezvous){
            return response([
                'message' => 'Pas de rendez-vous trouvé.'
            ],403);
        }

        if($rendezvous->user_id != auth()->user()->id)
        {
            return response([
                'message' => 'Permission refusé.'
            ],403);
        }
        //validate fields
        $attrs = $request->validate([
            'motif' => 'required|string',
            'status' => 'required|bool'
        ]);

        $rendezvous->update([
            'motif' => 'required|string',
            'status' => 'required|bool'
        ]);

        //for now skip for rendezvous image
        return response([
            'message' => 'Rendez-vous mis à jour.',
            'rendezvous' =>$rendezvous
        ],200);
    }

    //delete rendezvous

    public function destroy($id) {
        $rendezvous =Rdv::find($id);
        if(!$rendezvous){
            return response([
                'message' => 'Pas de rendez-vous trouvé.'
            ],403);
        }

        if($rendezvous->user_id != auth()->user()->id)
        {
            return response([
                'message' => 'Permission refusé.'
            ],403);
        }

        $rendezvous->cliniques()->delete();
        $rendezvous->delete();

        return response([
            'message' => 'Rendez-vous supprimer.'
        ],200);
    }

}
