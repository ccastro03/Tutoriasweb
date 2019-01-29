<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptoscobroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptoscobro', function (Blueprint $table) {
			$table->string('year',4);
			$table->string('concept_cod',3);
			$table->string('concept_nom',100);
			$table->double('valor',17,2);
			$table->primary(['year','concept_cod']);
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
        Schema::dropIfExists('conceptoscobro');
    }
}
