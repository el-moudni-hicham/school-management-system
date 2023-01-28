<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->nullable();
            $table->string('nom');
            $table->string('adresse')->nullable();
            $table->string('prenom');
            $table->string('cin')->unique();
            $table->string('telephone');
            $table->string('email')->unique();

            $table->date('date_naissance');
            $table->string('sexe');
            $table->date('date_service')->nullable();
            $table->string('rib',24);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enseignants');
    }
}
