<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NumberverifiedController extends Controller
{
    public function numberverified($code)
    {
    	$user = User::where('number_code', $code)->get();
    	if(count($user))
    	{
    		User::where('number_code', $code)->update(['number_verified' => 1]);
    		return redirect('/login')->with('success', 'Account verified');
    	}
    	else
    	{
    		abort(403);
    	}
    	
    }
}
