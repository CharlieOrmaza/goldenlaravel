<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelplanesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotelplanes', function(Blueprint $table)
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
			$table->string('nombreHotel');
			$table->date('fechaDeEntrada');
			$table->date('fechaDeSalida');
			$table->string('sgl');
			$table->string('dbl');
			$table->string('tpl');
			$table->string('cpl');
			$table->string('otros');
			$table->string('junior');
			$table->string('tarifaHotel');
			$table->string('plan');
			$table->string('claveHotel');
			$table->string('menores12');
			$table->string('confirmoHotel');
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
		Schema::drop('hotelplanes');
	}

}
