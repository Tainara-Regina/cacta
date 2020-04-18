<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcurarVagaHome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
      Schema::create('procurar_vaga_home', function (Blueprint $table) {
          $table->bigIncrements('id');
           $table->string('title');
           $table->string('titulo');
           $table->string('subtitulo_1');
            $table->string('subtitulo_2');
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
       Schema::dropIfExists('procurar_vaga_home');
    }
}
