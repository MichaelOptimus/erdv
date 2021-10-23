<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Rdv;

class Specialite extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle'
        ];

        public function users()
        {
            return $this->hasMany(User::class);
        }

        public function rdvs()
        {
            return $this->hasMany(Rdv::class);
        }
}
