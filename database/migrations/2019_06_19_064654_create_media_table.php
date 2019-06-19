<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('src', 65535);
			$table->integer('typeMedia_id')->index('fk_Media_typeMedia_idx');
			$table->integer('Escuela_id')->index('fk_Media_Escuela1_idx');
			$table->primary(['id','typeMedia_id','Escuela_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media');
	}

}
