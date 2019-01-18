<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\TipoDocumentos;

class TipoDocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        $tpdocu = new TipoDocumentos();
        $tpdocu->codigo = 'TI';
        $tpdocu->nombre = 'Tarjeta Identidad';
        $tpdocu->save();
		
        $tpdocu = new TipoDocumentos();
        $tpdocu->codigo = 'TE';
        $tpdocu->nombre = 'Tarjeta Extranjeria';
        $tpdocu->save();

        $tpdocu = new TipoDocumentos();
        $tpdocu->codigo = 'CC';
        $tpdocu->nombre = 'Cedula Ciudadania';
        $tpdocu->save();

        $tpdocu = new TipoDocumentos();
        $tpdocu->codigo = 'CE';
        $tpdocu->nombre = 'Cedula Extranjeria';
        $tpdocu->save();

        $tpdocu = new TipoDocumentos();
        $tpdocu->codigo = 'PP';
        $tpdocu->nombre = 'Pasaporte';
        $tpdocu->save();		
    }
}
