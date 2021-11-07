<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $table='rdvs';

    protected $fillable = [
        'commentaire',
        'status',
        'date_rdv',
        'haure_rdv',
        'user',
        'clinique',
        'specialite',
    ];
}
