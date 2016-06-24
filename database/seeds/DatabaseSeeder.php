<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(RoleTableSeeder::class);
        $this->call(FacultadTableSeeder::class);
        $this->call(EscuelaTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SemestreTableSeeder::class);
        $this->call(PlanEstudiantilTableSeeder::class);
        $this->call(UbigeoTableSeeder::class);
        $this->call(CursoTableSeeder::class);
        $this->call(HoraTableSeeder::class);
        
        Model::reguard();
    }
}
