<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CursoConteudo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_conteudo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cursosId')->unsigned();
            $table->string('conteudo');
            $table->foreign('cursosId')->references('id')->on('cursos')->onDelete('cascade');;
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
        Schema::dropIfExists('curso_conteudo');

    }
}
