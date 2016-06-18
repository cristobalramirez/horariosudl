<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradoacademicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradoacademico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipogrado',20);
            $table->string('mencion'); //Identificador único para este producto.
            $table->timestamp('fechaobtencion');
            $table->string('situacion');
            $table->string('descripcion');
            $table->integer('docente_id')->unsigned()->nullable();
            $table->foreign('docente_id')->references('id')->on('docente');
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
        schema::drop('gradoacademico');
    }
}
