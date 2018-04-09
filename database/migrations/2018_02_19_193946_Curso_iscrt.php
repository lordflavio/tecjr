<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CursoIscrt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('curso_inscritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('participanteId')->unsigned();
            $table->integer('cursosId')->unsigned();
            $table->integer('transacaoId')->unsigned();
            $table->integer('certificado');
            $table->foreign('transacaoId')->references('id')->on('transacoes')->onDelete('cascade');
            $table->foreign('participanteId')->references('id')->on('participante')->onDelete('cascade');
            $table->foreign('cursosId')->references('id')->on('cursos')->onDelete('cascade');
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
        Schema::dropIfExists('curso_inscritos');
    }
}
