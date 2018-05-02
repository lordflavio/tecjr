<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Atividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area',80);
            $table->string('cordenacao');
            $table->string('palestrante');
            $table->string('convidados');
            $table->string('modalidade',80);
            $table->integer('vagas');
            $table->integer('horas');
            $table->string('titulo',150);
            $table->date('data');
            $table->string('horario',150);
            $table->string('local',150);
            $table->integer('eventoId')->unsigned();
            $table->foreign('eventoId')->references('id')->on('eventos')->onDelete('cascade');
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
        Schema::dropIfExists('atividades');
    }
}
