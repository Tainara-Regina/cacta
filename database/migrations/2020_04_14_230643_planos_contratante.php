<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanosContratante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
      Schema::create('planos_contratante', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('preco');
        $table->string('plano');
        $table->string('vagas_em_destaque');
        $table->string('quantidade_vagas');
        $table->string('banco_de_candidatos');
        $table->string('materiais_exclusivos');
        $table->string('tempo_disponivel_vaga');
        $table->string('tipo');
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
     Schema::dropIfExists('planos_contratante');
   }
 }
