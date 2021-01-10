<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tbl_event;
use App\Tbl_fetchyear;
use App\Tbl_yda_head;
use App\Tbl_pdf_header;
use PDF;
use Validator;
use App\User;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;
use App\Tbl_audit_trail;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdf_preview()
    {
    	$ydahead = Tbl_yda_head::where('id', 1)->get();
    	$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
    	$pdf = PDF::loadView('/pdf_preview', compact('dataImage', 'ydahead'));
        $pdf->setPaper('letter', 'portrait', 'arial');
        return $pdf->stream('preview.pdf'); 

    }

    public function index()
    {
        $notifications = NotificationHelper::notification();
    	$year = Tbl_fetchyear::where('id', 1)->value('year');
    	$event = Tbl_event::all();
    	$ydahead = Tbl_yda_head::where('id', 1)->get();

        $users = User::orderBy('first_name','ASC')
        ->where('id', '!=', 1)
        ->where('id', '!=', auth()->id())
        ->get();

    	return view('admin.setting', ['pdf' => '/pdf_preview'], compact('year', 'event', 'ydahead', 'notifications','users'))->with('pagename', 'Settings');  
    }

    public function makeAdmin(Request $request, $id)
    {
        if($request->ajax())
        {
            $check = User::where('id', $id)->where('usertype', 0)->get();

            if(count($check))
            {
                User::where('id', $id)->where('usertype', 0)->update(['usertype' => 1]);

                foreach ($check as $user) {}

                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Assigned'.' '.$user->first_name.' '.$user->last_name.' as an Admin User of the System',
                ]);
                return response()->json(['success' => 'User successfully assigned as an admin.']);  
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

    public function makeNormalUser(Request $request, $id)
    {
        if($request->ajax())
        {
            $check = User::where('id', $id)->where('usertype', 1)->get();

            if(count($check))
            {
                User::where('id', $id)->where('usertype', 1)->update(['usertype' => 0]);

                foreach ($check as $user) {}

                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Assigned'.' '.$user->first_name.' '.$user->last_name.' as a Normal User of the System',
                ]);

                return response()->json(['success' => 'Admin assigned as a default user.']);  
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
    

    public function changeuserstatus(Request $request, $id)
    {
        if($request->ajax())
        {
            $check = User::where('id', $id)->get();

            foreach ($check as $user) {}

            if(count($check))
            {
                $userstatus = User::where('id', $id)->value('status');
                

                if($userstatus == 1)
                {
                    User::where('id', $id)->update(['status' => 0]);

                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Deactived or Blocked'.' '.$user->first_name.' '.$user->last_name.' Account',
                    ]);

                    $text = ['blocked' => $id];
                    event(new NotificationEvent($text));

                    return response()->json(['success' => 'Account deactived or blocked.']);
                }
                else
                {
                    User::where('id', $id)->update(['status' => 1]);

                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Activated or Unblocked'.' '.$user->first_name.' '.$user->last_name.' Account',
                    ]);

                    return response()->json(['success' => 'Account activated or unblocked.']);
                }
                
            }
            else
            {
               return response()->json(['error' => 'Access denied, user not activated / deactivated']); 
            }
            
        }
        else
        {
            abort(404);
        }
    }
    public function update_event_status(Request $request, $id)
    {
    	if($request->ajax())
    	{
    		$event = Tbl_event::where('id', $id)->get();

            foreach ($event as $value) {}

    		if(count($event))
    		{
    			$status = Tbl_event::where('id', $id)->value('event_status');

    			if($status == 'open')
    			{
    				Tbl_event::where('id', $id)->update(['event_status' => 'close']);

                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Closed'.' '.$value->event_name.' Registration',
                    ]);

    				return response()->json(['success' => 'Event closed']);
    			}	
    			else
    			{
    				Tbl_event::where('id', $id)->update(['event_status' => 'open']);

                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Opened'.' '.$value->event_name.' Registration',
                    ]);

    				return response()->json(['success' => 'Event Open']);
    			}
    			
    		}
    		else
    		{
    			return response()->json(['error' => 'Access denied']);
    		}
    		
    	}
    	else
    	{
    		abort(404);
    	}
    	
    }

    public function changeyear(Request $request)
    {
    	if($request->ajax())
    	{	
    	
    	  Tbl_fetchyear::where('id', 1)->update(['year' => $request->year]);

          Tbl_audit_trail::create([
            'user_id'        => auth()->id(),
            'action_message' => 'Has been changed the fetch year to '.$request->year,
          ]);

    	  return response()->json(['success' => 'Changed fetch year']);
    	}
    	else
    	{
    		abort(403);
    	}
    }

    public function updateydahead(Request $request)
    {
    	$rules = array(
            'name' 		=>  'required',
            'position'  =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['error' => $error->errors()->all()]);
        }
        Tbl_yda_head::where('id', 1)->update(['name' => $request->name, 'position' => $request->position]);

        Tbl_audit_trail::create([
            'user_id'        => auth()->id(),
            'action_message' => 'Updated YDA Head Information',
        ]);

    	return response()->json(['success' => 'Updated yda head.']);
    }

    public function updatepdfheader(Request $request)
    {
    	$rules = array(
            'image'    =>  'required|image'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['error' => $error->errors()->all()]);
        }

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('ydapic'), $new_name);
        
        Tbl_audit_trail::create([
            'user_id'        => auth()->id(),
            'action_message' => 'Changed PDF Image Header',
        ]);

        Tbl_pdf_header::where('id', 1)->update(['image' => $new_name]);	
    	return response()->json(['success' => 'Change pdf header.']);
    }
}
