<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
			$table->string('tipodocumento',2)->nullable();
			$table->string('numdocumento',15);
			$table->string('nombre',40)->nullable();
			$table->string('apellido1',20)->nullable();
			$table->string('apellido2',20)->nullable();
			$table->string('nomcomple',120)->nullable();
			$table->string('cod_pais_nace',3)->nullable();
			$table->string('cod_estcivi',3)->nullable();
			$table->string('direccion',200)->nullable();
			$table->string('numtelefono',7)->nullable();
			$table->string('numcelular',10)->nullable();
			$table->string('email')->nullable();
			$table->string('cod_profesion',4)->nullable();
			$table->string('otra_profesion')->nullable();
			$table->string('cod_especialidad',4)->nullable();
			$table->string('otra_especialidad')->nullable();
			$table->string('empresa',40)->nullable();
			$table->string('cargo',40)->nullable();
			$table->string('dirempresa',40)->nullable();
			$table->string('telempresa',40)->nullable();
			$table->string('exalumno',1)->nullable();
			$table->string('notifica',1)->nullable();
			$table->string('fallecido',1)->nullable();
			$table->string('cod_rol',3)->nullable();
			$table->string('cod_estudiante',10)->nullable();
			$table->primary(['numdocumento','cod_estudiante']);
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
        Schema::dropIfExists('responsables');
    }
}
