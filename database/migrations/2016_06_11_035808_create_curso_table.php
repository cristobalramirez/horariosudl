<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('creditos');
            $table->integer('horasTeoricas');
            $table->integer('horasPracticas');
            $table->string('ciclo');
            $table->integer('escuela_id')->unsigned()->nullable();       
            $table->foreign('escuela_id')->references('id')->on('escuela');
            $table->integer('planEstudiantil_id')->unsigned()->nullable();       
            $table->foreign('planEstudiantil_id')->references('id')->on('planestudiantil');
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
        schema::drop('curso');
    }
}
