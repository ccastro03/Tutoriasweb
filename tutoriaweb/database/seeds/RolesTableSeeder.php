<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = new Role();
        $role->codigo = '01';
		$role->name = 'Administrador';
        $role->descripcion = 'Administrador';
        $role->save();

        $role = new Role();
        $role->codigo = '02';
		$role->name = 'Auxiliar';
        $role->descripcion = 'Auxiliar';
        $role->save();
		
        $role = new Role();
        $role->codigo = '03';
		$role->name = 'Estudiante';
        $role->descripcion = 'Estudiante';
        $role->save();

        $role = new Role();
        $role->codigo = '04';
		$role->name = 'Responsable';
        $role->descripcion = 'Responsable';
        $role->save();

        $role = new Role();
        $role->codigo = '05';
		$role->name = 'Acudiente';
        $role->descripcion = 'Acudiente';
        $role->save();		
    }
}
