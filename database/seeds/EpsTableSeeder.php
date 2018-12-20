<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Eps;

class EpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $eps = new Eps();
        $eps->codigo = '01';
        $eps->nombre = 'Otra';
        $eps->save();
		
        $eps = new Eps();
        $eps->codigo = '02';
        $eps->nombre = 'S.O.S';
        $eps->save();
		
        $eps = new Eps();
        $eps->codigo = '03';
        $eps->nombre = 'Sura';
        $eps->save();
		
        $eps = new Eps();
        $eps->codigo = '04';
        $eps->nombre = 'Comfenalco';
        $eps->save();
		
        $eps = new Eps();
        $eps->codigo = '05';
        $eps->nombre = 'Coomeva';
        $eps->save();		
    }
}
