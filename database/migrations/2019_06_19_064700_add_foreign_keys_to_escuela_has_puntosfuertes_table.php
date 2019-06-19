<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEscuelaHasPuntosfuertesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('escuela_has_puntosfuertes', function(Blueprint $table)
		{
			$table->foreign('Escuela_id', 'fk_Escuela_has_PuntosFuertes_Escuela1')->references('id')->on('escuela')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('PuntosFuertes_id', 'fk_Escuela_has_PuntosFuertes_PuntosFuertes1')->references('id')->on('puntosfuertes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('escuela_has_puntosfuertes', function(Blueprint $table)
		{
			$table->dropForeign('fk_Escuela_has_PuntosFuertes_Escuela1');
			$table->dropForeign('fk_Escuela_has_PuntosFuertes_PuntosFuertes1');
		});
	}

}
