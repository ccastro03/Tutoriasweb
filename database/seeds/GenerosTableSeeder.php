<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Generos;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $genero = new Generos();
        $genero->codigo = 'H';
        $genero->nombre = 'Hombre';
        $genero->save();
		
        $genero = new Generos();
        $genero->codigo = 'M';
        $genero->nombre = 'Mujer';
        $genero->save();	
    }
}
