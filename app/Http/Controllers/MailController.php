<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{

	public function index() 
	{
		return view("mail.mail");
	}

    public function send(Request $request)
    {
    	try {
    		$data = [
    			"foo" => "bar"
    		];

    		Mail::send('mail', $data, function($message) use($request) {
		         $message->to($request["email"], 'Laravel Class Malang')->subject('Laravel Basic Testing Mail');
		         $message->from("no-reply@laravelclass.com",'Laravel Class');
		    });

		    echo "Mail sent!";
    	} catch (\Exception $exception) {
    		return redirect()->back();
    	}
    }
}
