<?php

use Illuminate\Database\Seeder;

class EscuelaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escuela')->insert(array(
            array('nombre' => 'Escuela Profesional de Ingeniería de sistemas',
                'descripcion' => 'Escuela Profesional de Ingeniería de sistemas de la UDL',
                'facultad_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('nombre' => 'Escuela Profesional de Ingeniería de Ambiental',
                'descripcion' =>'Escuela Profesional de Ingeniería de Ambiental de la UDL',
                'facultad_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('nombre' => 'Escuela Profesional de Ingeniería Comercial',
                'descripcion' =>'Escuela Profesional de Ingeniería Comercial de la UDL',
                'facultad_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('nombre' => 'Escuela Profesional de Administración Turística',
                'descripcion' =>'Escuela Profesional de Administración Turística de la UDL',
                'facultad_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('nombre' => 'Escuela Profesional de Administración y Marketing',
                'descripcion' =>'Escuela Profesional de Administración y Marketing de la UDL',
                'facultad_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"))
    ));
    }
}
