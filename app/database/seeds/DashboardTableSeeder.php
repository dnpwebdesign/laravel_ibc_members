<?php

class DashboardTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('businesses')->truncate();

		$db = array(
			'member_id'=>'2',
			'status'=>'testing lagi aja loh'

		);

		// Uncomment the below to run the seeder
		DB::table('dashboard')->insert($db);
	}

}
