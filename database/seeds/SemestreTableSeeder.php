<?php

use Illuminate\Database\Seeder;

class SemestreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semestre')->insert(array(
            array('codigo' => '2010-I',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2010-II',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2011-I',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2011-II',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2012-I',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2012-II',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2013-I',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2013-II',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2014-I',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2014-II',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2015-I',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2015-II',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2016-I',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('codigo' => '2016-II',
                'fechainicio' => '0000-00-00 00:00:00',
                'fechafin' => '0000-00-00 00:00:00',
                'estado' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
    ));
    }
}