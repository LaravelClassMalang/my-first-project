<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10000)->create(['password' => bcrypt('secret')]);
    	// for($i = 1; $i <=5; $i++){
	    //     User::create([
	    //     	'name' => 'Dummy User '.$i, 
	    //     	'email' => 'dummy'.$i.'@example.com',
	    //     	'password' => 'rahasia',
	    //     ]);
	    // }
    }
}
