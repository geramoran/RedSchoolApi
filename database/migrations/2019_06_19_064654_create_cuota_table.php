<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuotaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuota', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 50);
			$table->decimal('Precio', 10, 0)->nullable();
			$table->integer('Escuela_has_Nivel_id')->index('fk_Cuota_Escuela_has_Nivel1_idx');
			$table->primary(['id','Escuela_has_Nivel_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuota');
	}

}
