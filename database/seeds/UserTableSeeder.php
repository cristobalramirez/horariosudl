<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert(array(
            array('name' => 'soporte',
                'email' => 'soporte@udl.edu.pe',
                'password' => bcrypt('1234567'),
                'estado' => 1,
                'role_id' => 1,
                'escuela_id' => null,
                'image' => '/images/users/default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('name' => 'Segundo Jose Castillo Zumaran',
                'email' => 'sj.castillo@udl.edu.pe',
                'password' => bcrypt('9000601494'),
                'estado' => 1,
                'role_id' => 2,
                'escuela_id' => 1,
                'image' => '/images/users/default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('name' => 'Eduardo Julio Tejada Sánchez',
                'email' => 'e.tejada@udl.edu.pe',
                'password' => bcrypt('tejada123'),
                'estado' => 1,
                'role_id' => 2,
                'escuela_id' => 2,
                'image' => '/images/users/default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('name' => 'Genaro Lora Llontop',
                'email' => 'glora@udl.edu.pe',
                'password' => bcrypt('lora123'),
                'estado' => 1,
                'role_id' => 2,
                'escuela_id' => 3,
                'image' => '/images/users/default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('name' => 'Elvis Serruto Perea',
                'email' => 'e.serruto@udl.edu.pe',
                'password' => bcrypt('serruto123'),
                'estado' => 1,
                'role_id' => 2,
                'escuela_id' => 4,
                'image' => '/images/users/default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),
            array('name' => 'Pompeyo Marco Aragón Alvarado',
                'email' => 'paragon@udl.edu.pe',
                'password' => bcrypt('aragon123'),
                'estado' => 1,
                'role_id' => 2,
                'escuela_id' => 5,
                'image' => '/images/users/default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"))

    ));
    }
}
