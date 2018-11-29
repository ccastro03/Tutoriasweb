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
    }
}
