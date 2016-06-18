<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargaLectivaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargaLectiva', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grupo',3);
            $table->integer('docente_id')->unsigned()->nullable();       
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->integer('curso_id')->unsigned()->nullable();       
            $table->foreign('curso_id')->references('id')->on('curso');
            $table->integer('semestre_id')->unsigned()->nullable();       
            $table->foreign('semestre_id')->references('id')->on('semestre');
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
        schema::drop('cargaLectiva');
    }
}
