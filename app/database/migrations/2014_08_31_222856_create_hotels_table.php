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
			$table->string('junior');
			$table->string('tarifa');
			$table->string('plan');
			$table->string('clave');
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
		Schema::drop('hotels');
	}

}
