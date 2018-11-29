<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Paises;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $pais = new Paises();
        $pais->codigo = '1AS';
        $pais->nombre = 'Afganistán';
        $pais->save();		
    }
}
