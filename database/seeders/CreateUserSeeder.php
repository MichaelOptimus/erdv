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
                'nom' => 'Administrateur',
                'prenom' => 'User',
                'genre' => 'Homme',
                'phone' => '077000000',
                'datenaissance' => '1999-01-01',
                'email' => 'admin@admin.com',
                'profil' => 'admin',
                'password' => bcrypt('0000'),
            ]);
        User::create([
                'nom' => 'Gestionnaire',
                'prenom' => 'User',
                'genre' => 'Homme',
                'phone' => '062000000',
                'datenaissance' => '1999-01-01',
                'email' => 'gestion@gestion.com',
                'profil' => 'gestion',
                'clinique' => '1',
                'password' => bcrypt('0000'),
            ]);
        User::create([
                'nom' => 'Patient',
                'prenom' => 'User',
                'genre' => 'Homme',
                'phone' => '065000000',
                'datenaissance' => '1999-01-01',
                'email' => 'patient@patient.com',
                'profil' => 'patient',
                'password' => bcrypt('0000'),
            ]);
    }
}
