<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCodigoToCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('curso', function (Blueprint $table) {
            //
            $table->string('codigo'); //1-> activo, 0 -> no activo;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('curso', function (Blueprint $table) {
            $table->dropColumn('codigo'); 
        });
    }
}
