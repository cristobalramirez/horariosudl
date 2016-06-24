<?php

use Illuminate\Database\Seeder;

class PlanEstudiantilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planestudiantil')->insert(array(
            array('semestreInicio_id' => 1,
                'semestreFin_id' => 10,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('semestreInicio_id' => 11,
                'semestreFin_id' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
    ));
    }
}
