<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReconocimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reconocimientos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('Nombre', 65535);
			$table->integer('Escuela_id')->index('fk_Reconocimientos_Escuela1_idx');
			$table->primary(['id','Escuela_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reconocimientos');
	}

}
