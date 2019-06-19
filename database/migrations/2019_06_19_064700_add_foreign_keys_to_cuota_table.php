<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCuotaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cuota', function(Blueprint $table)
		{
			$table->foreign('Escuela_has_Nivel_id', 'fk_Cuota_Escuela_has_Nivel1')->references('id')->on('escuela_has_nivel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cuota', function(Blueprint $table)
		{
			$table->dropForeign('fk_Cuota_Escuela_has_Nivel1');
		});
	}

}
