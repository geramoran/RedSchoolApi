<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContactoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contacto', function(Blueprint $table)
		{
			$table->foreign('Escuela_has_Nivel_id', 'fk_Contacto_Escuela_has_Nivel1')->references('id')->on('escuela_has_nivel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tipoContacto_id', 'fk_Contacto_tipoContacto1')->references('id')->on('tipocontacto')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contacto', function(Blueprint $table)
		{
			$table->dropForeign('fk_Contacto_Escuela_has_Nivel1');
			$table->dropForeign('fk_Contacto_tipoContacto1');
		});
	}

}
