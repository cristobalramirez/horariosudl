<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia');
            $table->integer('cargaLectiva_id')->unsigned()->nullable();
            $table->integer('ambiente_id')->unsigned()->nullable();
            $table->integer('horaInicio_id')->unsigned()->nullable();
            $table->foreign('cargaLectiva_id')->references('id')->on('cargaLectiva');
            $table->foreign('ambiente_id')->references('id')->on('ambiente');
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
        schema::drop('horario');
    }
}
