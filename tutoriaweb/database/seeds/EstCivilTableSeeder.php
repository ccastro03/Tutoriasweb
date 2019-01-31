<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\EstadoCivil;

class EstCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $estcivil = new EstadoCivil();
        $estcivil->codigo = 'SO';
        $estcivil->nombre = 'Soltero(a)';
        $estcivil->save();
		
        $estcivil = new EstadoCivil();
        $estcivil->codigo = 'CA';
        $estcivil->nombre = 'Casado(a)';
        $estcivil->save();

        $estcivil = new EstadoCivil();
        $estcivil->codigo = 'DI';
        $estcivil->nombre = 'Divociado(a)';
        $estcivil->save();	

        $estcivil = new EstadoCivil();
        $estcivil->codigo = 'VI';
        $estcivil->nombre = 'Viudo(a)';
        $estcivil->save();

        $estcivil = new EstadoCivil();
        $estcivil->codigo = 'UL';
        $estcivil->nombre = 'Union Libre';
        $estcivil->save();
		
        $estcivil = new EstadoCivil();
        $estcivil->codigo = 'OT';
        $estcivil->nombre = 'Otro';
        $estcivil->save();
    }
}