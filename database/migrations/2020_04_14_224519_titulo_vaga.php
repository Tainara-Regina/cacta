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
        $table->unsignedBigInteger('id_segmento');
        $table->foreign('id_segmento')->references('id')->on('segmento')
        ->onDelete('cascade');
        $table->timestamps();
        $table->string('titulo');
          $table->string('slug');
    });
  }




 // public function up()
 //    {
 //      Schema::create('titulo_vaga', function (Blueprint $table) {
 //        $table->bigIncrements('id')
 //        ->string('titulo')
 //        ->foreign('id_segmento')
 //        ->timestamps()
 //        ->references('id')->on('segmento')
 //        ->onDelete('cascade');
 //      });
 //    }




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

