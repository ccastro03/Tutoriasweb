<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Ciudades;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $ciudades = new Ciudades();
        $ciudades->cod_ciudad = '01';
        $ciudades->nombre = 'Cali';
        $ciudades->save();
		
        $ciudades = new Ciudades();
        $ciudades->cod_ciudad = '02';
        $ciudades->nombre = 'Barranquilla';
        $ciudades->save();

        $ciudades = new Ciudades();
        $ciudades->cod_ciudad = '03';
        $ciudades->nombre = 'Cartagena';
        $ciudades->save();

        $ciudades = new Ciudades();
        $ciudades->cod_ciudad = '04';
        $ciudades->nombre = 'Popayan';
        $ciudades->save();		
    }
}
