<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCircuitosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('circuitos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('papeleta');
			$table->string('operador');
			$table->string('operadorMayorista');
			$table->string('nombreCircuito');
			$table->string('descripcionCircuito');
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
		Schema::drop('circuitos');
	}

}
