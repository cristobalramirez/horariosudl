<?php

use Illuminate\Database\Seeder;

class UbigeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubigeo')->insert(array(
            array('nombredistrito' => "CHICLAYO",
                'nombreprovincia' => "CHICLAYO",
                'nombredepartamento' => "LAMBAYEQUE",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
    ));
    }
}
