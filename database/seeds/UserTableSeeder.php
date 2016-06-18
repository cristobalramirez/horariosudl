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
                'email' => 'scastillo@udl.edu.pe',
                'password' => bcrypt('9000601494'),
                'estado' => 1,
                'role_id' => 2,
                'escuela_id' => 1,
                'image' => '/images/users/default.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"))
    ));
    }
}
