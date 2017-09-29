<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParticipanteHasAtividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante_has_atividades', function (Blueprint $table) {
            $table->integer('participanteId')->unsigned();
            $table->integer('eventosId')->unsigned();
            $table->integer('atividadeId')->unsigned();
            $table->foreign('participanteId')->references('id')->on('participante')->onDelete('cascade');
            $table->foreign('eventosId')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('atividadeId')->references('id')->on('atividades')->onDelete('cascade');
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
        Schema::dropIfExists('participante_has_atividades');

    }
}
