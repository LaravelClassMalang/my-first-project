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
		// dd( \Hash::check('rahasia', '$2y$10$YiB1NiZ5qkRsiMn9sLkm8.YetUWfvrWA.M/jpywZlpLnnOSrljJpa') );
		// dd( \Auth::attempt(['email' => $request->email, 'password' => $request->password]));
		try {
			if (\Auth::attempt($request->except("_token"))) {
				return redirect()->route('products.index');
				return response()->json(\Auth::user());
			} else {
				return redirect()->back();
				return response()->json("Login failed!");
			}
		} catch(\Exception $exception) {
			dd($exception);
		}
	}
}
