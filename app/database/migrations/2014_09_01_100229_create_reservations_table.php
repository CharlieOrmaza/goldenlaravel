<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('papeleta');
			$table->string('destino');
			$table->string('operador');
			$table->string('costoPax');
			$table->string('costoNeto');
			$table->string('observacionesPax');
			$table->string('observacionesAgencia');
			$table->date('tiempoLimite');
			$table->string('tipo');
			$table->string('estado');
			$table->integer('idCliente');
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
		Schema::drop('reservations');
	}

}
