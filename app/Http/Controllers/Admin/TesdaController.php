<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use App\Tbl_batch;
use App\Tbl_tesda_registration;
use Carbon\Carbon; 
use Validator;
use App\Events\NotificationEvent;
use App\Tbl_fetchyear;
use Nexmo\Laravel\Facade\Nexmo;
use App\Helpers\NotificationHelper;
use App\Tbl_audit_trail;

class TesdaController extends Controller
{	
	public function __construct()
    { 
        $this->middleware('auth');
    }

    public function index()
    {	
    	//STATUS OF USER
    	//1 - PENDING
    	//2 - UNFINISH
    	//3 - COMPLETED 
        //4 - ARCHIVE

    	//STATUS OF BATCHES
    	// 1 - UNFINISH
    	// 2 - COMPLETED
       $notifications = NotificationHelper::notification();
       $year = Tbl_fetchyear::where('id', 1)->value('year');
       $tesda = Tbl_tesda_registration::where('updated_at', 'LIKE', ''. $year . '%')->get();
       $batches = Tbl_batch::select('*')->orderBy('created_at', 'desc')->get();
	   return view('admin.tesda', compact('tesda','batches','notifications'))->with('pagename', 'IT Training Program');
    }
    public function archiveindex()
    {   
        $notifications = NotificationHelper::notification();
        $tesda = Tbl_tesda_registration::where('tesda_status', 4)->orderBy('updated_at', 'desc')->get();
        return view('admin.tesda_archive', compact('tesda','notifications'))->with('pagename', 'Archive');
    }

    public function addbatch(Request $request)
    {
    	$rules = array(
            
            'batch_name'	=> 'required|max:20|unique:tbl_batches',
			'schedule'		=> 'required|in:1,2',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        Tbl_batch::create(['batch_name' => $request->batch_name, 'schedule' => $request->schedule]); 


        Tbl_audit_trail::create([
            'user_id'        => auth()->id(),
            'action_message' => 'Created a new batch ('.$request->batch_name.')',
        ]);

    	return response()->json(['success' =>'Added new bacth.']); 
    }
    public function updatebatch(Request $request, $id)
    {  
        try
        {
            if($request->batch_names == '')
            {
                return response()->json(['error' =>'Batch name is required.']);
            }

            if($request->has('schedules'))
            {   
                if($request->schedules == '1' || $request->schedules == '2')
                {
                 
                    Tbl_batch::where('id', $id)->update(['batch_name' => $request->batch_names, 'schedule' => $request->schedules]);

                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Updated a batch ('.$request->batch_names.')',
                    ]);

                    return response()->json(['success' =>'Batch updated.']); 
                }
                else
                {
                    return response()->json(['error' =>'Invalid schedule.']);
                }
            }
            else
            {
                
                Tbl_batch::where('id', $id)->update(['batch_name' => $request->batch_names]);

                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Updated a batch ('.$request->batch_names.')',
                ]);

                return response()->json(['success' =>'Batch name updated.']); 
            }
        }
        catch(\Exception $e)
        {
            return response()->json(['error' => 'Batch name is already taken']);
        }
        
       
    }

    public function editbatch(Request $request, $id)
    {   
        if ($request->ajax())
        {
            $batch = Tbl_batch::where('id', $id)->get();

            $tesda = Tbl_tesda_registration::where('tbl_batch_id', $id)->get();
            return view('userpage.modals.show-batch', compact('id','batch','tesda'));
        }
        else
        {
            abort(404);
        }
    }

    public function markcompleted($id)
    {
        $check = Tbl_batch::where('id', $id)->get();
        if(count($check))
        {  
            $tesda = Tbl_tesda_registration::where('tbl_batch_id', $id)->get();
            if(count($tesda))
            {
                Tbl_batch::where('id', $id)->update(['status' => 2]);

                foreach($check as $batchname){}
                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Marked '.$batchname->batch_name.' as session completed',
                ]);

                return response()->json(['success' => 'Status marked as session completed']);  
            }
            else
            {
               return response()->json(['error' => "Can't mark as session completed because no connected user to this batch"]); 
            }
            
        }
        else
        {
            return response()->json(['error' => 'Access Denied']);
        }
        
    }
    public function markunfinish($id)
    {   

        $check = Tbl_batch::where('id', $id)->get();
        if(count($check))
        {  
            $tesda = Tbl_tesda_registration::where('tbl_batch_id', $id)->where('tesda_status', 3)->get();
            

            if(count($tesda) < 1)
            {
                Tbl_batch::where('id', $id)->update(['status' => 1]);

                foreach($check as $batchname){}

                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Marked '.$batchname->batch_name.' as unfinish session',
                ]);

                return response()->json(['success' => 'Status marked as unfinish session']); 
            }
            else
            {

               return response()->json(['error' => "Can't mark as unfinish session because this batch has user/s with mark as completed"]);
            }
            
        }
        else
        {
            return response()->json(['error' => 'Access Denied']);
        }
        
    }
    public function deletebatch($id)
    {   
        $check = Tbl_batch::where('id', $id)->get();
        if(count($check))
        {  
            $tesda = Tbl_tesda_registration::where('tbl_batch_id', $id)->get();
            if(count($tesda) < 1)
            {

                foreach($check as $batchname){}

                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Deleted '.$batchname->batch_name.' for tesda batch',
                ]);

                Tbl_batch::where('id', $id)->delete();

                return response()->json(['success' => 'Batch deleted.']); 
            }
            else
            {

               return response()->json(['error' => "Can't delete, this batch has member/s already"]);
            }
        }
        else
        {
            return response()->json(['error' => 'Access Denied']);
        }
        
    }

    public function addremark(Request $request, $id)
    { 
        $tesda = Tbl_tesda_registration::where('user_id', $id)->get();

        if(count($tesda) > 0)
        {
            $rules = array(
                'remark'    => 'required|max:150|',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }


            Tbl_tesda_registration::where('user_id', $id)->update(['remarks' => $request->remark]);

            foreach ($tesda as $value) {}

            Tbl_audit_trail::create([
                'user_id'        => auth()->id(),
                'action_message' => 'Sent'.' '.$value->user->first_name.' '.$value->user->last_name.' a remark for'.' IT Training Program'
            ]);

            $text = ['remark' => $id];
            event(new NotificationEvent($text));
            return response()->json(['success' => 'Remark sent']); 
        }
        else
        {
            return response()->json(['error' => 'Access Denied']);
        }  


    }
    public function restore($id)
    {
        if(auth()->user()->usertype == 1)
        {
            $check = Tbl_tesda_registration::where('user_id', $id)->get();
            if(count($check))
            {
                Tbl_tesda_registration::where('user_id', $id)->update(['tesda_status' => 1]);

                foreach ($check as $value) {}

                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Restored'.' '.$value->user->first_name.' '.$value->user->last_name.' record from Archive List to Pending List in IT Training Program',
                ]);

                return response()->json(['success' => 'Restored']);
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
    public function movearchive($id)
    {
        if(auth()->user()->usertype == 1)
        {
            $check = Tbl_tesda_registration::where('user_id', $id)->get();
            if(count($check))
            {
                Tbl_tesda_registration::where('user_id', $id)->update(['tesda_status' => 4]);

                foreach ($check as $value) {}

                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Moved'.' '.$value->user->first_name.' '.$value->user->last_name.' to Archive List in IT Training Program',
                ]);

                return response()->json(['success' => 'Moved to archive']);
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
    
    public function showbatch(Request $request, $id)
    {
        if ($request->ajax())
        {
            $schedule = Tbl_tesda_registration::where('user_id', $id)->value('schedule');
            if($schedule == 'Weekend')
            {
                $batch = Tbl_batch::where('schedule', 1)->where('status', 1)->orderBy('created_at', 'desc')->get();

                return view('userpage.modals.fetchbatch', compact('batch', 'id'))->with('sched', 'Weekend');
            }
            else if($schedule == 'Weekdays')
            {
                $batch = Tbl_batch::where('schedule', 2)->where('status', 1)->orderBy('created_at', 'desc')->get();

                return view('userpage.modals.fetchbatch', compact('batch', 'id'))->with('sched', 'Weekedays');
            }
            else
            {
                abort(404);
            }
         }
        else
        {
            abort(404);
        }
    }
    
    public function movetobatch(Request $request, $id)
    {
        $batch = Tbl_batch::where('id',$request->batch)->get();
        if(count($batch))
        {
            $tesda = Tbl_tesda_registration::where('tbl_batch_id', $request->batch)->get();

            if(count($tesda) < 18)
            {
               Tbl_tesda_registration::where('user_id', $id)->update(['tesda_status' => 2, 'tbl_batch_id' => $request->batch]);

               foreach ($batch as $value) {}
               $registered = Tbl_tesda_registration::where('user_id', $id)->get();
               foreach ($registered as $tesdauser) {}


                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Added '.$tesdauser->user->first_name.' '.$tesdauser->user->last_name.' to '.$value->batch_name.' for IT Training Program',
                ]); 

               $text = ['move' => $id];
               event(new NotificationEvent($text));
               return response()->json(['success' => 'Moved to batch']);  
            }
            else
            {
                return response()->json(['error' => "Can't move, because this batch reached the max members"]);  
            }
               
        }
        else
        {
            return response()->json(['error' => 'Access denied']);
        }
            
        
    }
    
    public function fetchmember(Request $request, $id)
    {
        if ($request->ajax())
        {
            $batches = Tbl_batch::where('id', $id)->get();
            if(count($batches) > 0)
            {
                $tesda = Tbl_tesda_registration::where('tbl_batch_id', $id)->get();

                return view('userpage.includes.fetchmember', compact('tesda','batches', 'id'))->render();

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

    public function move_to_pending($id, Request $request)
    {
        if ($request->ajax())
        {

            $check = Tbl_tesda_registration::where('user_id', $id)->get();
            if(count($check))
            {
                Tbl_tesda_registration::where('user_id', $id)->update([
                    'tesda_status' => 1,
                    'tbl_batch_id' => null
                
                ]);

                foreach ($check as $value) {}
                Tbl_audit_trail::create([
                    'user_id'        => auth()->id(),
                    'action_message' => 'Moved '.$value->user->first_name.' '.$value->user->last_name.' to Pending List for IT Training Program',
                ]); 

                return response()->json(['success' => 'Moved to pending']); 
            }
            else
            {
                return response()->json(['erro' => 'Access Denied']); 
            }
            
        }
        else
        {
            abort(404);
        }
    }
    public function memberchangestatus(Request $request, $id)
    {
        if ($request->ajax())
        {

            $check = Tbl_tesda_registration::where('user_id', $id)->get();
            if(count($check))
            {
                foreach ($check as $tesda) {
                    if($tesda->tesda_status == 2)
                    {
                        $batch = Tbl_batch::where('id', $tesda->tbl_batch_id)->value('status');

                        if($batch == 2)
                        {
                            Tbl_tesda_registration::where('user_id', $id)->update([
                            'tesda_status' => 3,
                            ]);

                            Tbl_audit_trail::create([
                                'user_id'        => auth()->id(),
                                'action_message' => 'Marked '.$tesda->user->first_name.' '.$tesda->user->last_name.' as  session completed trainee for IT Training Program',
                            ]); 
                            return response()->json(['success' => 'Mark as completed']); 
                        } 
                        else
                        {
                            return response()->json(['error' => 'You should mark the batch as session completed before you can change the status of this user as completed.']); 
                        }
                        
                    }
                    else if($tesda->tesda_status == 3)
                    {
                        Tbl_tesda_registration::where('user_id', $id)->update([
                            'tesda_status' => 2,
                        ]);

                        Tbl_audit_trail::create([
                            'user_id'        => auth()->id(),
                            'action_message' => 'Marked '.$tesda->user->first_name.' '.$tesda->user->last_name.' as  unfinish session trainee for IT Training Program',
                        ]); 
                        return response()->json(['success' => 'Mark as unfinish.']); 
                    }


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
    public function sendSMS(Request $request, $batch_id)
    {
        try
        {
            

            foreach($request->SMSuser as $users)
            {
                $tesda = Tbl_tesda_registration::where('tbl_batch_id', $batch_id)
                ->where('user_id', $users)
                ->get();

                foreach($tesda as $userinfo)
                {
                    Nexmo::message()->send([
                        'to'   =>  $userinfo->user->contact,
                        'from' =>  'YDA Laguna',
                        'text' =>  $request->message
                    ]);
                    
                    Tbl_audit_trail::create([
                        'user_id'        => auth()->id(),
                        'action_message' => 'Delivered '.$userinfo->user->first_name.' '.$userinfo->user->last_name.' an SMS notification for IT Training Program',
                    ]);

                    Tbl_tesda_registration::where('user_id', $userinfo->user->id)->update(['sms_status' => 2]);
                }

            }

            return response()->json(['success' => 'Message Sent.']);
            
        }
        catch(\Exception $e)
        {
            return response()->json(['error' => 'Sending Failed. Please check your balance or internet connection.']);
        }
    }

}
