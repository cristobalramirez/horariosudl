<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',60);
            $table->string('apellidos',60); //Identificador único para este producto.
            $table->string('dni',8)->unique()->nullable(); 
            $table->timestamp('fechanacimiento')->nullable();
            $table->timestamp('fechaAlta')->nullable();
            $table->timestamp('fechabaja')->nullable();
            $table->string('direccion',100)->nullable();
            $table->integer('ubigeo_id')->unsigned()->nullable();
            $table->integer('escuela_id')->unsigned()->nullable();
            $table->foreign('ubigeo_id')->references('id')->on('ubigeo');
            $table->foreign('escuela_id')->references('id')->on('escuela');
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
         schema::drop('docente');
    }
}
