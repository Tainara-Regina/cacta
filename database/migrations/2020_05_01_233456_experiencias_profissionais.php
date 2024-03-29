<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExperienciasProfissionais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias_profissionais', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('candidato_id')->nullable();
        
        $table->foreign('candidato_id')->references('id')->on('cacta_candidatos') ->onDelete('cascade');

        $table->text('nome_empresa')->nullable();
        $table->text('cargo')->nullable();
        $table->date('inicio')->nullable();
        $table->date('conclusao')->nullable();
        $table->text('descricao')->nullable();
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
     Schema::dropIfExists('experiencias_profissionais');
   }
}
