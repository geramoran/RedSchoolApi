<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInstalacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('instalaciones', function(Blueprint $table)
		{
			$table->foreign('Escuela_id', 'fk_Instalaciones_Escuela1')->references('id')->on('escuela')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('instalaciones', function(Blueprint $table)
		{
			$table->dropForeign('fk_Instalaciones_Escuela1');
		});
	}

}
