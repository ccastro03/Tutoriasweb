<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Etnias;

class EtniaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $etnia = new Etnias();
        $etnia->codigo = '01';
        $etnia->nombre = 'Mestizo';
        $etnia->save();
		
        $etnia = new Etnias();
        $etnia->codigo = '02';
        $etnia->nombre = 'Mulato';
        $etnia->save();

        $etnia = new Etnias();
        $etnia->codigo = '03';
        $etnia->nombre = 'Blanco';
        $etnia->save();

        $etnia = new Etnias();
        $etnia->codigo = '04';
        $etnia->nombre = 'Afrocolombiano';
        $etnia->save();

        $etnia = new Etnias();
        $etnia->codigo = '05';
        $etnia->nombre = 'Indígena';
        $etnia->save();	

        $etnia = new Etnias();
        $etnia->codigo = '06';
        $etnia->nombre = 'Otra';
        $etnia->save();		
    }
}