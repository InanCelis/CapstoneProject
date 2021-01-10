<?php
namespace App\Helpers;

use App\Tbl_notification;
use Carbon\Carbon;

class NotificationHelper
{
	public static function notification()
	{	
		$notification = Tbl_notification::where('to_id', auth()->id())
		->orderBy('created_at','desc')
		->paginate(20);

		return $notification;	 
	}	
}