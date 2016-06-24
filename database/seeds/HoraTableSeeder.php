<?php

use Illuminate\Database\Seeder;

class HoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hora')->insert(array(
            array('hora' => '08:00:00',
                'horaFin' => '08:50:00',
                'orden' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '08:50:00',
                'horaFin' => '09:40:00',
                'orden' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '09:40:00',
                'horaFin' => '10:30:00',
                'orden' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '10:50:00',
                'horaFin' => '11:40:00',
                'orden' => 4,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '11:40:00',
                'horaFin' => '12:30:00',
                'orden' => 5,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '12:30:00',
                'horaFin' => '13:20:00',
                'orden' => 6,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '13:20:00',
                'horaFin' => '14:10:00',
                'orden' => 7,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '14:10:00',
                'horaFin' => '15:00:00',
                'orden' => 8,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '15:00:00',
                'horaFin' => '15:50:00',
                'orden' => 9,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '15:50:00',
                'horaFin' => '16:40:00',
                'orden' => 10,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '16:40:00',
                'horaFin' => '17:30:00',
                'orden' => 11,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '17:50:00',
                'horaFin' => '18:40:00',
                'orden' => 12,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '18:40:00',
                'horaFin' => '19:30:00',
                'orden' => 13,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '19:30:00',
                'horaFin' => '20:20:00',
                'orden' => 14,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '20:20:00',
                'horaFin' => '21:10:00',
                'orden' => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('hora' => '21:10:00',
                'horaFin' => '22:00:00',
                'orden' => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"))
    ));
    }
}
