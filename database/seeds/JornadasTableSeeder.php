<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Jornadas;

class JornadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $jornada = new Jornadas();
        $jornada->codigo = 'AM';
        $jornada->nombre = 'Mañana';
        $jornada->save();
		
		$jornada = new Jornadas();
        $jornada->codigo = 'PM';
        $jornada->nombre = 'Tarde';
        $jornada->save();
		
		$jornada = new Jornadas();
        $jornada->codigo = 'NO';
        $jornada->nombre = 'Noche';
        $jornada->save();
    }
}
