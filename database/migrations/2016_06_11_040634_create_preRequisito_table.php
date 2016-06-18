<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreRequisitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preRequisito', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso_id')->unsigned()->nullable();       
            $table->foreign('curso_id')->references('id')->on('curso');
            $table->integer('preRequisito_id')->unsigned()->nullable();       
            $table->foreign('preRequisito_id')->references('id')->on('curso');
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
