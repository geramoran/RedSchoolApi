<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('media', function(Blueprint $table)
		{
			$table->foreign('Escuela_id', 'fk_Media_Escuela1')->references('id')->on('escuela')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('typeMedia_id', 'fk_Media_typeMedia')->references('id')->on('typemedia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('media', function(Blueprint $table)
		{
			$table->dropForeign('fk_Media_Escuela1');
			$table->dropForeign('fk_Media_typeMedia');
		});
	}

}
