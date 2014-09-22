<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PapeletaTableSeeder extends Seeder {

	public function run()
	{
		DB::table('papeletas')->delete();

		Papeleta::create(array(
            'papeleta' => '2000',
		));
	}

}