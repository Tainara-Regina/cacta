<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCactaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cacta_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_contratante')->nullable();
            $table->string('nome_empresa')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefone')->nullable();
            $table->string('password');
            $table->string('id_segmento')->nullable();
            $table->rememberToken();
            $table->string('verificado')->default(false);
            $table->string('completou_cadastro')->default(false);
            $table->string('key_verificacao')->nullable();
            $table->string('logo')->nullable();


            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('bairro')->nullable();
            $table->string('localidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();


            $table->text('sobre')->nullable();
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
        Schema::dropIfExists('cacta_users');
    }
}
