<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		//$this->call('MembertypesTableSeeder');
		//$this->call('TypesTableSeeder');
		//$this->call('BusinessesTableSeeder');
		$this->command->info('Table seeded!');
	}

}