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
        $tpdocu->nombre = 'Tarjeta Extranjería';
        $tpdocu->save();

        $tpdocu = new TipoDocumentos();
        $tpdocu->codigo = 'CC';
        $tpdocu->nombre = 'Cédula Ciudadanía';
        $tpdocu->save();

        $tpdocu = new TipoDocumentos();
        $tpdocu->codigo = 'CE';
        $tpdocu->nombre = 'Cédula Extranjería';
        $tpdocu->save();

        $tpdocu = new TipoDocumentos();
        $tpdocu->codigo = 'PP';
        $tpdocu->nombre = 'Pasaporte';
        $tpdocu->save();		
    }
}
