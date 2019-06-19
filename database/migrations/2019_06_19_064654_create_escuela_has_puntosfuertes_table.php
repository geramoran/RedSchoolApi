<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEscuelaHasPuntosfuertesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('escuela_has_puntosfuertes', function(Blueprint $table)
		{
			$table->integer('Escuela_id')->index('fk_Escuela_has_PuntosFuertes_Escuela1_idx');
			$table->integer('PuntosFuertes_id')->index('fk_Escuela_has_PuntosFuertes_PuntosFuertes1_idx');
			$table->primary(['Escuela_id','PuntosFuertes_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('escuela_has_puntosfuertes');
	}

}
