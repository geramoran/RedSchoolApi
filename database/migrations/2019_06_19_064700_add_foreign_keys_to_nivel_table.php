<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNivelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nivel', function(Blueprint $table)
		{
			$table->foreign('nivelAtributos_id', 'fk_nivel_nivelAtributos1')->references('id')->on('nivelatributos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('subnivel_id', 'fk_nivel_subnivel1')->references('id')->on('subnivel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nivel', function(Blueprint $table)
		{
			$table->dropForeign('fk_nivel_nivelAtributos1');
			$table->dropForeign('fk_nivel_subnivel1');
		});
	}

}
