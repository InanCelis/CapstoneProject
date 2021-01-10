<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Nexmo\Laravel\Facade\Nexmo;
use App\User;
use App\Tbl_fetchyear;
use App\Tbl_event;
use App\Tbl_event_registration;
use App\Tbl_sms_history;
use App\Helpers\NotificationHelper;
use App\Tbl_audit_trail;

class SmsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function smsmodal($event_id)
    {
    	$year = Tbl_fetchyear::value('year');

        $event = Tbl_event_registration::where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', $event_id)
        ->orderBy('updated_at', 'desc')
        ->get();

        $event_name = Tbl_event::where('id', $event_id)->value('event_name');
        $event_id = $event_id;
        return view('userpage.modals.send-sms', compact('year','event','event_name', 'event_id'));
    }

    
    public function smshistory()
    {
    	$year = Tbl_fetchyear::value('year');
    	$smshistory = Tbl_sms_history::where('created_at', 'LIKE', ''. $year . '%')
    	->orderBy('updated_at', 'desc')
    	->get();

    	
    	return view('userpage.modals.sms-history', compact('year', 'smshistory'));
    }

    public function sendSMS(Request $request, $event_id)
    {

    	try
    	{
	    	$year = Tbl_fetchyear::value('year');

	    	foreach($request->SMSuser as $users)
	    	{
	    		$event = Tbl_event_registration::where('created_at', 'LIKE', ''. $year . '%')
	    		->where('user_id', $users)
	    		->where('event_registration_status', 2)
	    		->where('tbl_event_id', $event_id)
	    		->get();

	    		foreach($event as $userinfo)
	    		{
	    			Nexmo::message()->send([
					    'to'   =>  $userinfo->user->contact,
					    'from' =>  'YDA Laguna',
					    'text' =>  $request->message 
					]);

					$data = [
						'from'    		=> 'YDA Laguna',
						'message' 		=> $request->message,
						'tbl_event_id'  => $event_id,
						'user_id' 		=> $userinfo->user->id,
					];

	    			Tbl_sms_history::create($data);

                     Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Delivered '.$userinfo->user->first_name.' '.$userinfo->user->last_name.' an SMS notification for '.$userinfo->tbl_event->event_name,
                    ]);
	    		}

	    	}

           

	    	return response()->json(['success' => 'Message Sent.']);
	    	
	    }
	    catch(\Exception $e)
	    {
	    	return response()->json(['error' => 'Sending Failed. Please check your balance or internet connection.']);
	    }
  
    }

    
    public function viewsmsdetail($id)
    {
    	$smsdetail = Tbl_sms_history::where('id', $id)->get();

    	return view('userpage.modals.sms-view-detail', compact('smsdetail'));
    }
}
