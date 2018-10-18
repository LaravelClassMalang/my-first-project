<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = "admins";

    protected $hidden = [
    	"password"
    ];   

    /**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	// public function getAuthPassword()
	// {
	//     return $this->pass;
	// } 
}
