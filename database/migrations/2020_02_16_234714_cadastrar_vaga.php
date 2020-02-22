<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CadastrarVaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cadastrar_vaga', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('id_usuario');
            $table->text('faixa_salarial');
            $table->text('contratacao');
            $table->text('quantidade_vaga');
            $table->text('titulo');
            $table->text('vaga_em_destaque');
            $table->longText('descricao');
            $table->longText('requisitos');
            $table->longText('desejavel');
            $table->longText('beneficios');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadastrar_vaga');
    }
}
