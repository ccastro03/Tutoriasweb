<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Profesiones;

class ProfesionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $profe = new Profesiones();
        $profe->codigo = 'OT';
        $profe->nombre = 'Otra';
        $profe->save();
		
        $profe = new Profesiones();
        $profe->codigo = 'NA';
        $profe->nombre = 'No Aplica';
        $profe->save();

        $profe = new Profesiones();
        $profe->codigo = '01';
        $profe->nombre = 'Ingeniero(a)';
        $profe->save();

        $profe = new Profesiones();
        $profe->codigo = '02';
        $profe->nombre = 'Abogado(a)';
        $profe->save();	

        $profe = new Profesiones();
        $profe->codigo = '03';
        $profe->nombre = 'Medico(a)';
        $profe->save();

        $profe = new Profesiones();
        $profe->codigo = '04';
        $profe->nombre = 'Fisiatra';
        $profe->save();		
    }
}
