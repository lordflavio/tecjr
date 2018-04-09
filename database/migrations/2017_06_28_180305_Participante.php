<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Participante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique();
            $table->string('nome', 150);
            $table->string('sexo',13);
            $table->string('pais',13);
            $table->string('cpf', 15);
            $table->string('celular', 20);
            $table->string('telefone', 20);
            $table->string('area_cod', 20);
            $table->string('cep', 20);
            $table->string('endereco',200);
            $table->integer('numero');
            $table->string('cidade',100);
            $table->string('estado',80);
            $table->string('bairro',80);
            $table->string('formacao',150);
            $table->string('instituicao',300);
            $table->string('area_formacao',100);
            $table->string('subarea',100);
            $table->string('img');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('participante');
    }
}
