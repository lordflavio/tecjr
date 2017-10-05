<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventoSubmissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_submissao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eventoid')->unsigned();
            $table->text('descricao');
            $table->string('link');
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
        Schema::dropIfExists('evento_submissao');
    }
}
