<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CursosCandidatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cursos_candidatos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('candidato_id')->nullable();
          $table->string('nome_instituicao')->nullable();
          $table->string('grau')->nullable();
          $table->string('nome_curso')->nullable();
          $table->timestamp('inicio')->nullable();
          $table->timestamp('conclusao')->nullable();
           $table->string('observacao')->nullable();
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
     Schema::dropIfExists('cursos_candidatos');
 }
}

