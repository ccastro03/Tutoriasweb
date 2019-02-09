<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Sedes;

class SedesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $sedes = new Sedes();
        $sedes->codigo = '01';
        $sedes->nombre = 'Norte';
        $sedes->save();
		
        $sedes = new Sedes();
        $sedes->codigo = '02';
        $sedes->nombre = 'Sur';
        $sedes->save();

        $sedes = new Sedes();
        $sedes->codigo = '03';
        $sedes->nombre = 'Oriente';
        $sedes->save();

        $sedes = new Sedes();
        $sedes->codigo = '04';
        $sedes->nombre = 'Occidente';
        $sedes->save();
		
        $sedes = new Sedes();
        $sedes->codigo = '05';
        $sedes->nombre = 'Única';
        $sedes->save();			
    }
}
