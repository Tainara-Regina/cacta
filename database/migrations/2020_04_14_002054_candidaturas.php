<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('candidaturas', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('candidato_id')->nullable();
         // $table->string('candidato_id')->nullable();
        $table->foreign('candidato_id')->references('id')->on('cacta_candidatos') ->onDelete('cascade');



        $table->unsignedBigInteger('vaga_id')->nullable();
        $table->foreign('vaga_id')->references('id')->on('cadastrar_vaga') ->onDelete('cascade');

       //   $table->string('vaga_id')->nullable();
        $table->boolean('visualizado_pela_empresa')->default(false);
        $table->timestamp('canditatura_em')->nullable();
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
     Schema::dropIfExists('candidaturas');
   }
 }

