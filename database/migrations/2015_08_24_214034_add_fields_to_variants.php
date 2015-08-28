<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToVariants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variants', function (Blueprint $table) {
            //
            $table->string('codigo')->nullable()->after('id');
            $table->boolean('observado')->nullable();
            $table->text('nota')->nullable();
            $table->text('image')->nullable();
            $table->string('category')->nullable();
            $table->boolean('favorite')->nullable();
            //$table->
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variants', function (Blueprint $table) {
            //
        });
    }
}
