<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacto', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('valor', 65535);
			$table->integer('tipoContacto_id')->index('fk_Contacto_tipoContacto1_idx');
			$table->integer('Escuela_has_Nivel_id')->index('fk_Contacto_Escuela_has_Nivel1_idx');
			$table->primary(['id','tipoContacto_id','Escuela_has_Nivel_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacto');
	}

}
