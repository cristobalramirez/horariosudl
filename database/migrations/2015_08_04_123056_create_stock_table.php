<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('stockActual',10,2);
            $table->decimal('stockMin',10,2);
            $table->decimal('stockMinSoles',10,2);
            $table->integer('variant_id')->unsigned();
            $table->integer('warehouse_id')->unsigned();
            $table->foreign('variant_id')->references('id')->on('variants');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
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
        Schema::drop('stock');
    }
}
