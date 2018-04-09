<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Eventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',150);
            $table->string('titulo',150);
            $table->string('valor_inscricao',20);
            $table->string('endereco');
            $table->string('numero',20);
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado',10);
            $table->string('cep',10);
            $table->string('email');
            $table->string('fone',18);
            $table->text('descricao');
            $table->date('dateInicioIns');
            $table->date('dateFimIns');
            $table->date('dateInicioEx');
            $table->date('dateFimEx');
            $table->string('programacao');
            $table->text('descIns');
            $table->text('map');
            $table->string('banner');
            $table->string('img');
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
        Schema::dropIfExists('eventos');
    }
}
