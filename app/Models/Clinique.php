<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rdv;



class Clinique extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse' ,
        'phone' ,
        'email',
    ];

        public function rdvs()
        {
            return $this->hasMany(Rdv::class);
        }

}
