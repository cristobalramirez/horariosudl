<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanestudiantilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planestudiantil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semestreInicio_id')->unsigned()->nullable();       
            $table->foreign('semestreInicio_id')->references('id')->on('semestre');
            $table->integer('semestreFin_id')->unsigned()->nullable();       
            $table->foreign('semestreFin_id')->references('id')->on('semestre');
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
        schema::drop('planestudiantil');
    }
}
