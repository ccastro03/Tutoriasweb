<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Grados;

class GradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $grado = new Grados();
        $grado->codigo = '1';
        $grado->nombre = '1°';
        $grado->save();
		
        $grado = new Grados();
        $grado->codigo = '2';
        $grado->nombre = '2°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '3';
        $grado->nombre = '3°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '4';
        $grado->nombre = '4°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '5';
        $grado->nombre = '5°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '6';
        $grado->nombre = '6°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '7';
        $grado->nombre = '7°';
        $grado->save();	

        $grado = new Grados();
        $grado->codigo = '8';
        $grado->nombre = '8°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '9';
        $grado->nombre = '9°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '10';
        $grado->nombre = '10°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '11';
        $grado->nombre = '11°';
        $grado->save();		
    }
}
