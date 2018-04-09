<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Curos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('data');
            $table->boolean('inscricoes');
            $table->string('situacao');
            $table->string('valorInscricao',20);
            $table->string('horario',20);
            $table->string('titulo',250);
            $table->string('duracao',30);
            $table->text('descricao');
            $table->string('ministrante');
            $table->text('publicoAlvo');
            $table->text('preRequisitos');
            $table->text('objetivo');
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
        Schema::dropIfExists('cursos');
    }
}
