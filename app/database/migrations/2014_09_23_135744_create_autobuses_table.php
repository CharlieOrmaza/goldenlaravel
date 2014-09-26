<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAutobusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('autobuses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('papeleta');
			$table->string('operador');
			$table->string('linea');
			$table->date('fechaSalida');
			$table->date('fechaRegreso');
			$table->string('tipo');
			$table->string('origenyHorario');
			$table->string('destinoyHorario');
			$table->integer('numeroPersonas');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('autobuses');
	}

}
