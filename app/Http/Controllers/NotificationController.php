<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tbl_notification;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    	$notifications = NotificationHelper::notification();
    	
    	return view('/userpage.notification', compact('notifications'))->with('pagename', 'Notifications');
    }

    public function showmorenotif(Request $request)
    {
    	if ($request->ajax()) {

           $notifications = NotificationHelper::notification();
           
     	   return view('userpage.includes.notif_content', compact('notifications'))->with('pagename', 'Notifications')->render();
        }
        else {
            abort(404);
        }
    }
}
