<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FundoVagaHome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
      Schema::create('fundo_vaga_home', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->boolean('disponivel');
            $table->string('imagem');
             $table->string('titulo');
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
       Schema::dropIfExists('fundo_vaga_home');
    }
}

