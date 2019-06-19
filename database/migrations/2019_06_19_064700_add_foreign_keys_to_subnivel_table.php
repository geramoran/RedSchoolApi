<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubnivelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subnivel', function(Blueprint $table)
		{
			$table->foreign('subNivelAtributos_id', 'fk_subnivel_subNivelAtributos1')->references('id')->on('subnivelatributos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subnivel', function(Blueprint $table)
		{
			$table->dropForeign('fk_subnivel_subNivelAtributos1');
		});
	}

}
