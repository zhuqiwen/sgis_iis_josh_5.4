<?php

class AdminSeeder extends DatabaseSeeder {

	public function run()
	{
		DB::table('users')->truncate(); // Using truncate function so all info will be cleared when re-seeding.
		DB::table('roles')->truncate();
		DB::table('role_users')->truncate();
		DB::table('activations')->truncate();

		$admin = Sentinel::registerAndActivate(array(
			'email'       => 'admin@admin.com',
			'password'    => "admin",
			'first_name'  => 'John',
			'last_name'   => 'Doe',
		));

        $olga = Sentinel::registerAndActivate(array(
            'email'       => 'okalentz@indiana.edu',
            'password'    => "admin",
            'first_name'  => 'Olga',
            'last_name'   => 'Kalentzidou',
        ));

        $callum = Sentinel::registerAndActivate(array(
            'email'       => 'stewarcc@iu.edu',
            'password'    => "admin",
            'first_name'  => 'Callum',
            'last_name'   => 'Stewart',
        ));

        $emily = Sentinel::registerAndActivate(array(
            'email'       => 'emistern@indiana.edu',
            'password'    => "admin",
            'first_name'  => 'Emily',
            'last_name'   => 'Stern',
        ));

		$adminRole = Sentinel::getRoleRepository()->createModel()->create([
			'name' => 'Admin',
			'slug' => 'admin',
			'permissions' => array('admin' => 1),
		]);

		Sentinel::getRoleRepository()->createModel()->create([
			'name'  => 'User',
			'slug'  => 'user',
		]);

		$admin->roles()->attach($adminRole);
        $this->command->info('Admin User created with username admin@admin.com and password admin');

        $olga->roles()->attach($adminRole);
        $this->command->info('Olga\'s Admin Account created');

        $callum->roles()->attach($adminRole);
        $this->command->info('Callum Steward\'s Admin Account created');

        $emily->roles()->attach($adminRole);
		$this->command->info('Emily Stern\'s Admin User created');
	}

}