<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\Religion;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $religion = new Religion();
        $religion->codigo = '01';
        $religion->nombre = 'Católica';
        $religion->save();
		
        $religion = new Religion();
        $religion->codigo = '02';
        $religion->nombre = 'Protestante';
        $religion->save();

        $religion = new Religion();
        $religion->codigo = '03';
        $religion->nombre = 'Ateo';
        $religion->save();

        $religion = new Religion();
        $religion->codigo = '04';
        $religion->nombre = 'Otra';
        $religion->save();		
    }
}
