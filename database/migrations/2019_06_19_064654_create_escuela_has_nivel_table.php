<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEscuelaHasNivelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('escuela_has_nivel', function(Blueprint $table)
		{
			$table->integer('Escuela_id')->index('fk_Escuela_has_Nivel_Escuela1_idx');
			$table->integer('Nivel_id');
			$table->integer('Nivel_ModoEducacion_id');
			$table->integer('id', true);
			$table->index(['Nivel_id','Nivel_ModoEducacion_id'], 'fk_Escuela_has_Nivel_Nivel1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('escuela_has_nivel');
	}

}
