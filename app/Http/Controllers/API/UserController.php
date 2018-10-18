<?php

/**
 * @Author: Fatoni
 * @Date:   2018-10-17 21:50:40
 * @Last Modified by:   Fatoni
 * @Last Modified time: 2018-10-17 21:53:24
 */
namespace App\Http\Controllers\API;

use App\User;

class UserController{

	public function index()
	{
		$users = User::limit(20)->get()->toArray();

		return response()->json($users);
	}
}