<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        User::create([
                'nom' => 'BIBANG BEFENE',
                'prenom' => 'Joseph Donovan',
                'genre' => 'Homme',
                'phone' => '077702017',
                'datenaissance' => '1993-11-30',
                'email' => 'admin@admin.com',
                'profil' => 'admin',
                'password' => bcrypt('0000'),
            ]);
        User::create([
                'nom' => 'BIBANG BEFENE',
                'prenom' => 'Joseph Donovan',
                'genre' => 'Homme',
                'phone' => '062031871',
                'datenaissance' => '1993-11-30',
                'email' => 'gestion@gestion.com',
                'profil' => 'gestion',
                'clinique' => '1',
                'password' => bcrypt('0000'),
            ]);
        User::create([
                'nom' => 'BIBANG BEFENE',
                'prenom' => 'Joseph Donovan',
                'genre' => 'Homme',
                'phone' => '077270523',
                'datenaissance' => '1993-11-30',
                'email' => 'patient@patient.com',
                'profil' => 'patient',
                'password' => bcrypt('0000'),
            ]);
    }
}
