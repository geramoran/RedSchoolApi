<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEscuelaHasNivelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('escuela_has_nivel', function(Blueprint $table)
		{
			$table->foreign('Escuela_id', 'fk_Escuela_has_Nivel_Escuela1')->references('id')->on('escuela')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Nivel_id', 'fk_Escuela_has_Nivel_Nivel1')->references('id')->on('nivel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('escuela_has_nivel', function(Blueprint $table)
		{
			$table->dropForeign('fk_Escuela_has_Nivel_Escuela1');
			$table->dropForeign('fk_Escuela_has_Nivel_Nivel1');
		});
	}

}
