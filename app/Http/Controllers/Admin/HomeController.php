<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;

class HomeController extends Controller
{

    public function showLogin()
	{
	    return view("admin.login");
	}

	public function doLogin(AdminLoginRequest $request)
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
