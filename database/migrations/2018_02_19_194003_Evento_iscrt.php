<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventoIscrt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('eventos_inscritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('participanteId')->unsigned();
            $table->integer('eventosId')->unsigned();
            $table->integer('transacaoId')->unsigned();
            $table->foreign('transacaoId')->references('id')->on('transacoes')->onDelete('cascade');
            $table->foreign('participanteId')->references('id')->on('participante')->onDelete('cascade');
            $table->foreign('eventosId')->references('id')->on('eventos')->onDelete('cascade');;
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
        Schema::dropIfExists('eventos_inscritos');

    }
}
