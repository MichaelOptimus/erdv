<?php

namespace App\Http\Controllers;

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
}
