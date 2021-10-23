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
            $table->string('motif');
            $table->boolean('status');
            //$table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->unsignedBigInteger('clinique_id');
            //$table->foreign('clinique_id')->references('id')->on('cliniques');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('clinique_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('specialite_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('rdvs', function (Blueprint $table){

            $table->dropConstrainedForeignId('clinique_id');
            $table->dropConstrainedForeignId('user_id');
        });

        Schema::dropIfExists('rdvs');



    }
}
