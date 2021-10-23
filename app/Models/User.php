<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profession;
use App\Models\Specialite;
use App\Models\Rdv;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom',
        'prenom',
        'genre',
        'phone',
        'datenaissance',
        'email',
        'password',
        'specialite_id',
        'profession_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function specialites()
    {
        return $this->belongsTo(Specialite::class);
    }
    public function professions()
    {
        return $this->belongsTo(Profession::class);
    }

    public function rdvs()
    {
        return $this->hasMany(Rdv::class);
    }

}
