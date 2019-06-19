<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNivelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nivel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 50);
			$table->integer('subnivel_id')->index('fk_nivel_subnivel1_idx');
			$table->integer('nivelAtributos_id')->index('fk_nivel_nivelAtributos1_idx');
			$table->primary(['id','subnivel_id','nivelAtributos_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nivel');
	}

}
