<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->text('commentaire')->nullable();
            $table->enum('status', ['attente', 'confirme', 'effectue', 'annule'])->default('attente');
            $table->date('date_rdv')->nullable()->default(null);
            $table->time('heure_rdv')->nullable()->default(null);
            $table->integer('user');
            $table->integer('clinique');
            $table->integer('specialite');
            $table->timestamps();
        });

        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('rdvs');
    }
}
