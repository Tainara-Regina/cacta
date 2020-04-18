<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CactaCandidatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cacta_candidatos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('nome')->nullable();
          $table->string('sobrenome')->nullable();
          $table->string('email')->unique()->nullable();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('telefone')->nullable();
          $table->string('whatsapp')->nullable();
          $table->string('password');
          $table->string('id_segmento_enterece')->nullable();
          $table->string('data_nascimento')->nullable();
          $table->rememberToken();
          $table->string('verificado')->default(false);
          $table->string('completou_cadastro')->default(false);
          $table->string('key_verificacao')->nullable();
          $table->string('apresentacao')->nullable();
          $table->string('escolariedade')->nullable();
          $table->string('sonhos_objetivos')->nullable();
          $table->string('sua_historia')->nullable();
          $table->string('sexo')->nullable();
          $table->string('livros')->nullable();
          $table->string('hobbies')->nullable();
          $table->string('cursos_gostaria')->nullable();

          //criar tabela de cursos workshop e especializações 
         //criar uma tabela de esperiencias profissionais

          $table->string('cep')->nullable();
          $table->string('logradouro')->nullable();
          $table->string('bairro')->nullable();
          $table->string('localidade')->nullable();
          $table->string('uf')->nullable();
          $table->string('numero')->nullable();
          $table->string('complemento')->nullable();
          $table->string('endereco')->nullable();


          $table->string('facebook')->nullable();
          $table->string('instagram')->nullable();
          $table->string('twitter')->nullable();
          $table->string('site')->nullable();


          $table->string('id_plano')->nullable();
          $table->string('nome_cartao')->nullable();
          $table->string('numero_cartao')->nullable();
          $table->string('expira_cartao')->nullable();
          $table->string('codigo_seguranca_cartao')->nullable();
          $table->timestamp('ultimo_acesso')->nullable();
          $table->boolean('disponivel_banco_candidatos')->default(true);
          $table->boolean('cadastro_ativo')->default(false);
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
        Schema::dropIfExists('cacta_candidatos');
    }
}
