<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRentadeunidadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rentadeunidads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('papeleta');
			$table->string('empresaTuristica');
			$table->string('tipoUnidad');
			$table->string('tipo');
			$table->string('descripcionviaje');
			$table->date('fechayhoraSalida');
			$table->date('fechayhoraRegreso');
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
		Schema::drop('rentadeunidads');
	}

}
