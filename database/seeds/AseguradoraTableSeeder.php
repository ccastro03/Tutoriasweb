<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Aseguradora;

class AseguradoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '01';
        $aseguradora->nombre = 'SBS SEGUROS COLOMBIA S.A';
        $aseguradora->save();
		
        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '02';
        $aseguradora->nombre = 'ALLIANZ COLOMBIA';
        $aseguradora->save();		

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '03';
        $aseguradora->nombre = 'ASEGURADORA SOLIDARIA';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '04';
        $aseguradora->nombre = 'AXA COLPATRIA SEGUROS';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '05';
        $aseguradora->nombre = 'EQUIDAD SEGUROS';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '06';
        $aseguradora->nombre = 'HDI SEGUROS S.A';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '07';
        $aseguradora->nombre = 'LIBERTY SEGUROS';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '08';
        $aseguradora->nombre = 'MAPFRE';
        $aseguradora->save();		
		
        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '09';
        $aseguradora->nombre = 'PREVISORA SEGUROS';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '10';
        $aseguradora->nombre = 'QBE SEGUROS COLOMBIA';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '11';
        $aseguradora->nombre = 'RSA SEGUROS';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '12';
        $aseguradora->nombre = 'SEGUROS BOLIVAR';
        $aseguradora->save();		
		
        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '13';
        $aseguradora->nombre = 'SEGUROS DEL ESTADO';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '14';
        $aseguradora->nombre = 'SEGUROS MUNDIAL';
        $aseguradora->save();

        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '15';
        $aseguradora->nombre = 'SURA';
        $aseguradora->save();
		
        $aseguradora = new Aseguradora();
        $aseguradora->codigo = '16';
        $aseguradora->nombre = 'OTRA';
        $aseguradora->save();		
    }
}
