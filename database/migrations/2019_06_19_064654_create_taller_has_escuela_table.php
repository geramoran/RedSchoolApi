<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTallerHasEscuelaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taller_has_escuela', function(Blueprint $table)
		{
			$table->integer('Taller_id')->index('fk_Taller_has_Escuela_Taller1_idx');
			$table->integer('Escuela_id')->index('fk_Taller_has_Escuela_Escuela1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taller_has_escuela');
	}

}
