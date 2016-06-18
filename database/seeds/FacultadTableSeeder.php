<?php

use Illuminate\Database\Seeder;

class FacultadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facultad')->insert(array(
            array('nombre' => 'Facultad de Ciencias de Ingeniería',
                'descripcion' => 'Facultad de Ciencias de Ingeniería de la Universidad de Lambayeque',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('nombre' => 'Facultad de Ciencias Administrativas',
                'descripcion' =>'Facultad de Ciencias Administrativas de la Universidad de Lambayeque',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
    ));
    }
}
