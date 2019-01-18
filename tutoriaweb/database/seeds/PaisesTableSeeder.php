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
        $pais->codigo = 'AF';
        $pais->nombre = 'Afganistán';
        $pais->save();		
		
        $pais = new Paises();
        $pais->codigo = 'CO';
        $pais->nombre = 'Colombia';
        $pais->save();

        $pais = new Paises();
        $pais->codigo = 'BA';
        $pais->nombre = 'Brazil';
        $pais->save();

        $pais = new Paises();
        $pais->codigo = 'RU';
        $pais->nombre = 'Rusia';
        $pais->save();

        $pais = new Paises();
        $pais->codigo = 'FR';
        $pais->nombre = 'Francia';
        $pais->save();

        $pais = new Paises();
        $pais->codigo = 'AL';
        $pais->nombre = 'Albania';
        $pais->save();

        $pais = new Paises();
        $pais->codigo = 'VE';
        $pais->nombre = 'Venezuela';
        $pais->save();		
    }
}
