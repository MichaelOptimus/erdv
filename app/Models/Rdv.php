<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Clinique;
use App\Models\Specialite;


class Rdv extends Model
{
    use HasFactory;

    protected $fillable = [
    'motif',
    'status',
    'clinique_id',
    'user_id',
    'specialite_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function cliniques()
    {
        return $this->belongsTo(Clinique::class);
    }

    public function specialites()
    {
        return $this->belongsTo(Specialite::class);
    }
}
