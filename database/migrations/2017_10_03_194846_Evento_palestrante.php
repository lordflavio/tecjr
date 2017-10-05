<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventoPalestrante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_palestrante', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eventoid')->unsigned();
            $table->string('nome');
            $table->string('atividade');
            $table->string('formacao');
            $table->string('img');
            $table->string('lattes');
            $table->foreign('eventoid')->references('id')->on('eventos')->onDelete('cascade');;
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
        Schema::dropIfExists('evento_palestrante');
    }
}
