<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
			$table->string('codigo_est',10);
			$table->string('tipodocumento',2)->nullable();
			$table->string('numdocumento',15)->unique();
			$table->string('nombre',40)->nullable();
			$table->string('apellido1',20)->nullable();
			$table->string('apellido2',20)->nullable();
			$table->string('cod_ciu_vive',8)->nullable();
			$table->string('direccion',200)->nullable();
			$table->string('barrio',10)->nullable();
			$table->string('numtelefono',7)->nullable();
			$table->string('numcelular',10)->nullable();
			$table->string('genero',15)->nullable();
			$table->string('email')->nullable();
			$table->date('fechanace')->nullable();
			$table->string('cod_ciu_nace',8)->nullable();
			$table->string('cod_pais_nace',3)->nullable();
			$table->string('tiposangre',3)->nullable();
			$table->string('sede',3)->nullable();
			$table->string('grado',2)->nullable();
			$table->string('jornada',2)->nullable();
			$table->string('cobertura',1)->nullable();
			$table->string('grpetnico',2)->nullable();
			$table->string('desplazado',1)->nullable();
			$table->string('sisben',1)->nullable();
			$table->string('nvlsisben',1)->nullable();
			$table->string('cod_eps',3)->nullable();
			$table->string('otra_eps')->nullable();
			$table->string('cod_prepagada',4)->nullable();
			$table->string('otra_prepagada')->nullable();
			$table->string('cod_ciud_proced',8)->nullable();
			$table->string('cole_proced',200)->nullable();
			$table->string('cod_religion',2)->nullable();
			$table->string('otra_religion')->nullable();
			$table->string('segurovida',1)->nullable();
			$table->string('asegurador',4)->nullable();
			$table->string('otra_asegurador')->nullable();
			$table->string('matriculado',1)->nullable();
			$table->date('fechamatri')->nullable();
			$table->string('foliomatri',6)->nullable();
			$table->string('foliolibro',4)->nullable();
			$table->string('becado',1)->nullable();
			$table->string('tipobeca',1)->nullable();
			$table->string('pctbeca',6)->nullable();
			$table->string('becador',15)->nullable();
			$table->string('transporte',1)->nullable();
			$table->string('tipotransp',1)->nullable();
			$table->string('seccion',2)->nullable();
			$table->string('grupo',2)->nullable();
			$table->string('anolectivo',4)->nullable();
			$table->string('promociona',1)->nullable();
			$table->string('asistente',1)->nullable();
			$table->string('seguroest',1)->nullable();
			$table->string('activo',1)->nullable();
			$table->string('nuevo',1)->nullable();
			$table->string('exalumno',1)->nullable();
			$table->string('retirado',1)->nullable();
			$table->string('cod_retiro',2)->nullable();
			$table->string('obsretiro',250)->nullable();
			$table->date('fecharetiro')->nullable();
			$table->string('anoretiro',4)->nullable();
			$table->string('cod_contable',20)->nullable();
			$table->string('cod_niif',20)->nullable();
			$table->string('cod_familia',4)->nullable();
			$table->string('alerta',250)->nullable();
			$table->string('observacion',600)->nullable();
			$table->string('cod_usuario',40)->nullable();
			$table->string('cod_rol',3)->nullable();
			$table->primary(['codigo_est', 'numdocumento']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
