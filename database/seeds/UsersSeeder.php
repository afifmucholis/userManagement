<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([ 
        	'name' => 'Admin', 
        	'email' => 'admin@gmail.com', 
        	'password' => bcrypt('secret'), 
        	'role' => 'admin' 
        ]);

        App\User::create([ 
        	'name' => 'Operasional', 
        	'email' => 'operasional@gmail.com', 
        	'password' => bcrypt('secret'), 
        	'role' => 'operasional' 
        ]);

        App\User::create([ 
        	'name' => 'User', 
        	'email' => 'user@gmail.com', 
        	'password' => bcrypt('secret'), 
        	'role' => 'user' 
        ]);
    }
}
