<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->string('codigo',50)->nullable();
			$table->date('fechainscrip')->nullable();
			$table->string('sede',3)->nullable();
			$table->string('numdocest',15)->nullable();
			$table->string('verificada',1)->nullable();
			$table->string('citacion',1)->nullable();
			$table->string('aprovada',1)->nullable();
			$table->primary('codigo');
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
        Schema::dropIfExists('inscripciones');
    }
}
