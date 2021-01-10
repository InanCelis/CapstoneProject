<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tbl_accreditation;
use App\Tbl_accreditation_request;
use App\Tbl_organization_member;
use Validator;
use App\Events\NotificationEvent;
use Nexmo\Laravel\Facade\Nexmo; 
use App\Helpers\NotificationHelper;
use App\Tbl_audit_trail;

class AccreditationController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        //pending = 0
        //accredited = 1
        //for renewal = 2
        //for approval = 3
        //archive = 4
        
    	$notifications = NotificationHelper::notification();
    	
    	$accreditation = Tbl_accreditation::all();
    	return view('admin.accreditation', compact('accreditation','notifications'))->with('pagename', 'Records');
    }
    public function viewapplicant($id)
    {
        $notifications = NotificationHelper::notification();
    	$accreditation = Tbl_accreditation::where('id', $id)->get();
    	if(count($accreditation))
    	{
    		$icons = [
		        'pdf' 	=> 'far fa-file-pdf text-danger',
		        'doc' 	=> 'far fa-file-word text-primary',
		        'docx' 	=> 'far fa-file-word text-primary',
		        'xls' 	=> 'far fa-file-excel text-success',
		        'xlsx' 	=> 'far fa-file-excel text-success',
		        'ppt' 	=> 'far fa-file-powerpoint text-warning',
		        'pptx' 	=> 'far fa-file-powerpoint text-warning',
		    ];
    		return view('admin.accreditation_view', compact('accreditation','icons','notifications'))->with('pagename', 'View');
    	}
    	else
    	{
    		abort(404);
    	}
    }

    public function archiveindex()
    {
    	$notifications = NotificationHelper::notification();
        $accreditation = Tbl_accreditation::where('status', 4)->orderBy('updated_at', 'desc')->get();
        return view('admin.accreditation_archive', compact('accreditation','notifications'))->with('pagename', 'Archive');
    }

    public function requestindex()
    {
        
       $notifications = NotificationHelper::notification();
       $req = Tbl_accreditation_request::all();

       return view('admin.accreditation_request', compact('req','notifications'))->with('pagename', 'Requests');
    }

    public function addremarkaccreditation(Request $request, $id)
    {
    	$acc = Tbl_accreditation::where('user_id', $id)->get();

        if(count($acc) > 0)
        {
            $rules = array(
                'remark'    => 'required|max:150|', 
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }


            Tbl_accreditation::where('user_id', $id)->update(['remarks' => $request->remark]);

            foreach($acc as $value){}

            Tbl_audit_trail::create([
                'user_id'        => auth()->id(),
                'action_message' => 'Sent'.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value->name.') a remark for Accreditation',
            ]);

            $text = ['accreditation_remark' => $id];
            event(new NotificationEvent($text));
            return response()->json(['success' => 'Remark sent']); 
        }
        else
        {
            return response()->json(['error' => 'Access Denied']);
        }  
    }

    

    public function update(Request $request, $id, $updatenum)
    {
    	if($request->ajax())
    	{
    		$accreditation = Tbl_accreditation::where('user_id', $id)->get();

    		$start = date('Y-m-d');
    		$end = date('Y-m-d', strtotime('+3 years'));

    		if(count($accreditation))
        	{	
        		$text = ['accreditationstatus' => $id];
           		event(new NotificationEvent($text));

                foreach ($accreditation as $value) {}

        		if($updatenum == 0)
            	{
            		Tbl_accreditation::where('user_id', $id)->update(['status' => $updatenum]);

                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Moved'.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value->name.') to Pending List for Accreditation',
                    ]);
            		return response()->json(['success' => 'moved in Pending Applicant list.']);
            	}
            	else if($updatenum == 1)
            	{
            		try
            		{

            			foreach($accreditation as $accreditation)
            			{
            				$name 				= $accreditation->name;
            				$number 			= $accreditation->user->contact;
            				$date_accredited	= $accreditation->date_accredited;
            			}

            			Nexmo::message()->send([
                        'to'   =>  $number,
                        'from' =>  'YDA Laguna',
                        'text' =>  'Good day! Your organization is now accredited. Please visit the office of YDA (Youth Development Affairs Office) to claim your Certificate of Accreditation.'
                    	]);

            			if($date_accredited == '')
            			{
            				Tbl_accreditation::where('user_id', $id)->update([
            					'date_accredited'		=> $start,
            					'date_of_expiration'    => $end,
            					'status' 				=> $updatenum
            				]);
            			}
            			else
            			{
            				Tbl_accreditation::where('user_id', $id)->update([
            					'date_of_expiration'    => $end,
            					'status' 				=> $updatenum
            				]);
            			}

                        Tbl_audit_trail::create([
                            'user_id'        => auth()->id(),
                            'action_message' => 'Accredited the organization of'.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value->name.')',
                        ]);

            			return response()->json(['success' => $name.' is now ACCREDITED, they received an SMS notification about this transaction.']);
            		}
            		catch(\Exception $e)
		    		{
		    			return response()->json(['error' => 'Sending Message Failed, check your balance']);
		   			}
            	}
            	else if($updatenum == 2)
            	{
            		try
            		{

            			foreach($accreditation as $accreditation)
            			{
            				$name 				= $accreditation->name;
            				$number 			= $accreditation->user->contact;
            				$date_accredited	= $accreditation->date_accredited;
            			}

            			Nexmo::message()->send([
                        'to'   =>  $number,
                        'from' =>  'YDA Laguna',
                        'text' =>  'Good day! We just want to inform you that the accreditation of your organization has expired. It is possible that terms and condition are vilolated such as, oudated requirements, violated rules and regulations, hazing, drugs use, and things that degrades your organization. Please visit the office of YDA for more information.'
                    	]);

            		
            			Tbl_accreditation::where('user_id', $id)->update([
            				'status' => $updatenum
            			]);
            			
                        Tbl_audit_trail::create([
                            'user_id'        => auth()->id(),
                            'action_message' => 'Moved organization of'.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value->name.') to Renewal List',
                        ]);

            			return response()->json(['success' => $name.' has been moved to renewal list.']);
            		}
            		catch(\Exception $e)
		    		{
		    			return response()->json(['error' => 'Sending Message Failed, check your balance']);
		   			}
            	}
            	else if($updatenum == 4)
            	{
            		Tbl_accreditation::where('user_id', $id)->update(['status' => $updatenum]);

                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Moved organization of'.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value->name.') to Archive List',
                    ]);

            		return response()->json(['success' => 'Move to Archive.']);
            	}
            	else
            	{
            		return response()->json(['error' => 'Access Denied']);
            	}


        	}
        	else
        	{
        		return response()->json(['error' => 'Access Denied']);
        	}
    		
    	}
    	else
    	{
    		abort(404);
    	}
    }

    public function add_feedback(Request $request)
    {
        $check = Tbl_accreditation_request::where('id', $request->request_id)->get();

        if(count($check))
        {
            Tbl_accreditation_request::where('id', $request->request_id)->update(['feedback' => $request->feedback]);


            foreach ($check as $value) {}

            $acc = Tbl_accreditation::where('user_id', $value->user_id)->get();

            foreach ($acc as $value2) {}

            Tbl_audit_trail::create([
                'user_id'        => auth()->id(),
                'action_message' => 'Sent Feedback to '.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value2->name.') request on '. \Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i A'),
            ]);
            // $ds = ;

            return response()->json(['success' => 'Feedback message sent.']);
        }
        else
        {
            return response()->json(['error' => 'Access Denied.']);
        }
        
    }

    public function update_request_status(Request $request, $id, $updatenum)
    {
        if($request->ajax())
        {
            $check = Tbl_accreditation_request::where('id', $id)->get();

            if(count($check))
            {

                Tbl_accreditation_request::where('id', $id)->update(['status' => $updatenum]);

                foreach ($check as $value) {}

                $acc = Tbl_accreditation::where('user_id', $value->user_id)->get();

                foreach ($acc as $value2) {}

                if($updatenum == 0)
                {
                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Moved '.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value2->name.') request in Pending List with request date '. \Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i A'),
                    ]);

                    return response()->json(['success' => 'Request has been moved in Pending List.']);
                }
                else if($updatenum == 1)
                {   
                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Approved '.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value2->name.') request with request date '. \Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i A'),
                    ]);
                    return response()->json(['success' => 'Request has been approved.']);
                }
                else if($updatenum == 2)
                {
                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Moved '.' '.$value->user->first_name.' '.$value->user->last_name.' ('.$value2->name.') request in Archive List with request date '. \Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i A'),
                    ]);
                    return response()->json(['success' => 'Request has been moved in Archived List.']);
                }
                else
                {
                    return response()->json(['error' => 'Request Denied!']); 
                }
            }
            else
            {
                return response()->json(['error' => 'Request Denied.']);
            }
           
        }
        else
        {
            abort(404);
        }
    }
}
