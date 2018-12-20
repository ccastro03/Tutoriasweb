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
        $grado->codigo = '10';
        $grado->nombre = 'Párvulos';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '11';
        $grado->nombre = 'Pre jardín ';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '12';
        $grado->nombre = 'Jardín';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '13';
        $grado->nombre = 'Transición';
        $grado->save();
		
        $grado = new Grados();
        $grado->codigo = '14';
        $grado->nombre = '1°';
        $grado->save();
		
        $grado = new Grados();
        $grado->codigo = '20';
        $grado->nombre = '2°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '30';
        $grado->nombre = '3°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '40';
        $grado->nombre = '4°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '50';
        $grado->nombre = '5°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '60';
        $grado->nombre = '6°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '70';
        $grado->nombre = '7°';
        $grado->save();	

        $grado = new Grados();
        $grado->codigo = '80';
        $grado->nombre = '8°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '90';
        $grado->nombre = '9°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '91';
        $grado->nombre = '10°';
        $grado->save();

        $grado = new Grados();
        $grado->codigo = '92';
        $grado->nombre = '11°';
        $grado->save();		
    }
}
