<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRentaAutosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rentaAutos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('papeleta');
			$table->string('operador');
			$table->string('arrendadora');
			$table->string('tipoDeAuto');
			$table->date('fechaEntraga');
			$table->date('fechaDevolucion');
			$table->string('LugaryhoraDeEntrega');
			$table->string('LugaryhoraDeDevolucion');
			$table->string('claveOperador');
			$table->string('claveArrendadora');
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
		Schema::drop('rentaAutos');
	}

}
