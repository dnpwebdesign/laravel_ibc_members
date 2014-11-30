<?php

class MembersBusinessesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('businesses')->truncate();

		$membersbusinesses = array(
				array(
					'business_id' =>1,
					'member_id' => 1,
					'is_owner' => 1,
					
					'role' => 'Director',
					'created_at' => new DateTime,
				),

				array(
					'business_id' =>1,
					'member_id' => 2,
					'is_owner' => 0,

					'role' => 'Marketing Manager',
					'created_at' => new DateTime,
				),
		);

		// Uncomment the below to run the seeder
		DB::table('members_businesses')->insert($membersbusinesses);
	}

}
