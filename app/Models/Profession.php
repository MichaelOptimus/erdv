<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profession extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle'
        ];
        public function users()
        {
            return $this->hasMany(User::class);
        }
}
