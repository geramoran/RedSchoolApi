<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTallerHasEscuelaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('taller_has_escuela', function(Blueprint $table)
		{
			$table->foreign('Escuela_id', 'fk_Taller_has_Escuela_Escuela1')->references('id')->on('escuela')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Taller_id', 'fk_Taller_has_Escuela_Taller1')->references('id')->on('taller')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('taller_has_escuela', function(Blueprint $table)
		{
			$table->dropForeign('fk_Taller_has_Escuela_Escuela1');
			$table->dropForeign('fk_Taller_has_Escuela_Taller1');
		});
	}

}
