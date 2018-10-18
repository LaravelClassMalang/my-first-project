<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <=5; $i++){
	        Admin::create([
	        	'name' => 'Dummy User '.$i, 
	        	'email' => 'admin'.$i.'@example.com',
	        	'password' => \Hash::make("rahasia"),
	        ]);
	    }
    }
}
