<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\NotificationHelper;

class MainController extends Controller
{
    public function index()
    {
    	$notifications = NotificationHelper::notification();
    	$fb_share_link = [
            "title" => 'YOUTH DEVELOPMENT AFFAIRS OFFICE OF LAGUNA',
            "description" => '',
            "url" => '',
            "published_time" => '',
            "modified_time" => '',
            "updated_time" => '',
            "image" => 'public/pageicon/yda.png',
            "secure_url" => '',
        ];
    	return view('/main', compact('notifications','fb_share_link'))->with('pagename', 'Youth Development Affairs office');
    }
}
