<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReconocimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reconocimientos', function(Blueprint $table)
		{
			$table->foreign('Escuela_id', 'fk_Reconocimientos_Escuela1')->references('id')->on('escuela')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reconocimientos', function(Blueprint $table)
		{
			$table->dropForeign('fk_Reconocimientos_Escuela1');
		});
	}

}
