<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('planes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('papeleta');
			$table->string('destino');
			$table->string('operador');
			$table->string('aerolinea');
			$table->string('clave');
			$table->string('equipaje');
			$table->string('tarifa');
			$table->string('itinerario');
			$table->date('FechaSalida');
			$table->date('FechaRegreso');
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
		Schema::drop('planes');
	}

}
