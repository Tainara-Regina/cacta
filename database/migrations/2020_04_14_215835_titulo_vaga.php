<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TituloVaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
      Schema::create('titulo_vaga', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('titulo');
          $table->string('id_segmento');
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
       Schema::dropIfExists('titulo_vaga');
    }
}

