<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert([
            'nombres' => 'Empleado',
            'apellidos' => 'Ejemplo',
            'direccioncontacto' => 'Direccion de Empleado Ejemplo',
            'dni' => '44226644',
            'codigo' => '001',
            'distrito' => 'Chiclayo',
            'provincia' => 'Chiclayo',
            'departamento' => 'Lambayeque',
            'pais' => 'Peru',
            'imagen' => '/images/employees/default.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}