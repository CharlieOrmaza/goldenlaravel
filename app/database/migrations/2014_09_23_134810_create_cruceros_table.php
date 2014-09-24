<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrucerosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cruceros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('papeleta');
			$table->string('operador');
			$table->string('naviera');
			$table->string('nombreBarco');
			$table->string('descripcionRuta');
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
		Schema::drop('cruceros');
	}

}
