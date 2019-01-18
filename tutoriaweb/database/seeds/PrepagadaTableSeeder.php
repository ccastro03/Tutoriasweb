<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Prepagada;

class PrepagadaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $prepagada = new Prepagada();
        $prepagada->codigo = '01';
        $prepagada->nombre = 'Otra';
        $prepagada->save();	

        $prepagada = new Prepagada();
        $prepagada->codigo = '02';
        $prepagada->nombre = 'Axa Colpatria';
        $prepagada->save();
		
        $prepagada = new Prepagada();
		$prepagada->codigo = '03';
        $prepagada->nombre = 'Sura';
        $prepagada->save();	
    }
}
