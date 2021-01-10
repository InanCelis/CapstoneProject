<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use App\Tbl_fetchyear; 
use App\Tbl_event_registration;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;
use App\Tbl_audit_trail;

class UpdateApplicantStatusController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function update($id, $updatenum)
    {
        $check = Tbl_event_registration::where('id', $id)->get();

        if(count($check))
        {   $userid  = Tbl_event_registration::where('id', $id)->value('user_id');
            Tbl_event_registration::where('id', $id)->update(['event_registration_status' => $updatenum]);

            $text = ['eventstatus' => $userid];
            event(new NotificationEvent($text));

            foreach ($check as $value) {}

            if($updatenum == 1)
            {
                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Moved'.' '.$value->user->first_name.' '.$value->user->last_name.' to pending list in'.' '.$value->tbl_event->event_name,
                ]); 
                return response()->json(['success' => 'Applicant has been moved in Pending List.']);
            }
            else if($updatenum == 2)
            {   
                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Moved'.' '.$value->user->first_name.' '.$value->user->last_name.' to Screening/Audition list in'.' '.$value->tbl_event->event_name,
                ]);

                return response()->json(['success' => 'Applicant has been moved in Screening/Audition List.']);
            }
            else if($updatenum == 3)
            {

                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Moved'.' '.$value->user->first_name.' '.$value->user->last_name.' to Passed list in'.' '.$value->tbl_event->event_name,
                ]);

                return response()->json(['success' => 'Applicant has been moved in Passed List.']);
            }
            else if($updatenum == 4)
            {
                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Moved'.' '.$value->user->first_name.' '.$value->user->last_name.' to Failed list in'.' '.$value->tbl_event->event_name,
                ]);

                return response()->json(['success' => 'Applicant has been moved in Failed List.']);
            }
            else
            {
                return response()->json(['error' => 'Access Denied!']); 
            }
            
        }  
        else
        {
            return response()->json(['error' => 'Access Denied!']);
        }
    }

    public function addeventremark(Request $request, $id)
    {
        $check = Tbl_event_registration::where('id', $id)->get();
        if(count($check))
        {
            $rules = array(
                'remark'    => 'required|max:150|',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }


            Tbl_event_registration::where('id', $id)->update(['remarks' => $request->remark]);

            $userid  = Tbl_event_registration::where('id', $id)->value('user_id');


            foreach($check as $value){}

            Tbl_audit_trail::create([
                'user_id'        => auth()->id(),
                'action_message' => 'Sent'.' '.$value->user->first_name.' '.$value->user->last_name.' a remark for'.' '.$value->tbl_event->event_name,
            ]);

            $text = ['eventremark' => $userid];
            event(new NotificationEvent($text));

            return response()->json(['success' => 'Remark sent']); 
        }  
        else
        {
            return response()->json(['error' => 'Access Denied!']);
        }
    }
    public function removeeventremarks(Request $request, $id)
    {
        if ($request->ajax()) 
        {
            $check = Tbl_event_registration::where('id', $id)
            ->where('user_id', auth()->id())->get();

            if(count($check))
            {
                Tbl_event_registration::where('id', $id)->update(['remarks' => null ]);
                return response()->json(['success' => 'Remark sent']);
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
}
