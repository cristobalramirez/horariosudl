<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilidadDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidadDocente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia');
            $table->integer('horaInicio_id')->unsigned()->nullable();
            $table->integer('docente_id')->unsigned()->nullable();
            $table->integer('semestre_id')->unsigned()->nullable();
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->foreign('semestre_id')->references('id')->on('semestre');
            $table->foreign('horaInicio_id')->references('id')->on('hora');
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
        schema::drop('disponibilidadDocente');
    }
}
