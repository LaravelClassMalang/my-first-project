<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function showLogin()
	{
	    return view("admin.login");
	}

	public function doLogin(Request $request)
	{
		try {
			if (\Auth::attempt($request->except("_token"))) {
				return response()->json(\Auth::user());
			} else {
				return response()->json("Login failed!");
			}
		} catch(\Exception $exception) {
			dd($exception);
		}
	}
}
