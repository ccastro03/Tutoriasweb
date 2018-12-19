<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Especialidades;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $espe = new Especialidades();
        $espe->codigo = 'OT';
        $espe->nombre = 'Otra';
        $espe->save();
		
        $espe = new Especialidades();
        $espe->codigo = 'NA';
        $espe->nombre = 'No Aplica';
        $espe->save();

        $espe = new Especialidades();
        $espe->codigo = '01';
        $espe->nombre = 'Astronomia';
        $espe->save();

        $espe = new Especialidades();
        $espe->codigo = '02';
        $espe->nombre = 'Cirujano';
        $espe->save();		
    }
}
