<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('semestre', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->timestamp('fechainicio');
            $table->timestamp('fechafin');
            $table->tinyInteger('estado');
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
        schema::drop('semestre');
    }
}
