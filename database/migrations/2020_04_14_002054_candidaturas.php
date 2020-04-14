<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('candidaturas', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('candidato_id')->nullable();
          $table->string('vaga_id')->nullable();
          $table->timestamp('canditatura_em')->nullable();
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
       Schema::dropIfExists('candidaturas');
    }
}

