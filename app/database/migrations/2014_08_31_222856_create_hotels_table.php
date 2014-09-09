<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('noPapeleta');
			$table->string('nombrePax');
			$table->string('telefono');
			$table->string('email');
			$table->string('referencia');
            $table->string('destino');
			$table->string('operador');
			$table->string('nombreHotel');
			$table->date('fechaDeEntrada');
			$table->date('fechaDeSalida');
			$table->string('sgl');
			$table->string('dbl');
			$table->string('tpl');
			$table->string('cpl');
			$table->string('otros');
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
		Schema::drop('hotels');
	}

}
