<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParticipanteHasCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante_has_cursos', function (Blueprint $table) {
            $table->integer('participanteId')->unsigned();
            $table->integer('cursosId')->unsigned();
            $table->float('custo', 8);
            $table->string('status');
            $table->foreign('participanteId')->references('id')->on('participante')->onDelete('cascade');;
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
        Schema::dropIfExists('participante_has_cursos');

    }
}
