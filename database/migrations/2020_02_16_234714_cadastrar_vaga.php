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
        $table->unsignedBigInteger('id_usuario');
        $table->foreign('id_usuario')->references('id')->on('cacta_users') ->onDelete('cascade');
        $table->text('faixa_salarial_de');
        $table->text('faixa_salarial_ate');
        $table->text('contratacao');
        $table->text('quantidade_vaga');
        $table->text('titulo');
        $table->text('vaga_em_destaque');
        $table->longText('descricao');
        $table->longText('requisitos');
        $table->boolean('disponivel')->default(true);
        $table->dateTime('data_de_criacao');
        $table->dateTime('data_de_expiracao')->nullable();
        $table->longText('desejavel')->nullable();
        $table->longText('beneficios')->nullable();
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
