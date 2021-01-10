<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tbl_event_registration;
use App\Tbl_event_member;
use App\Tbl_event;
use Validator;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;

class DanceRevolutionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $notifications = NotificationHelper::notification();
        $year = now('Asia/Manila')->year;

        $user = User::where('id', auth()->id())->get();

        $registeruser = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 6)
        ->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 6)
        ->where('event_registration_status', 2)
        ->get();

        $membercount = 1;
        $event_status = Tbl_event::where('id', 6)->value('event_status');

        return view('userpage.dance_revolution', compact('user', 'registeruser', 'membercount', 'event_user_status','event_status','notifications'))->with('pagename', 'Dance Revolution');
    }
  
    public function store(Request $request)
    {
       $eventStatus = Tbl_event::where('id', 6)->value('event_status');
        
        if($eventStatus == 'open')
        {

            $year = now('Asia/Manila')->year;

            $register_id = Tbl_event_registration::where('user_id', auth()->id())
            ->where('created_at', 'LIKE', ''. $year . '%')
            ->where('tbl_event_id', 6)
            ->value('id');

            $file = $request->all();

            if ($register_id === null) 
            {
                if (count($file['member_name']) < 8) {
                    return response()->json(['sorry' => 'Member should atleast 8 person!']);
                }

                $rules = array(
                    'name_of_group' =>  'required',
                    'member_name.*' =>  'required',
                    'member_image.*'   =>  'required|image',
                );

                $error = Validator::make($request->all(), $rules);

                if($error->fails())
                {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $data = array(
                    'name_of_group' => $request['name_of_group'],
                    'user_id'       => auth()->id(),
                    'tbl_event_id'  => '6',
                );

                Tbl_event_registration::create($data);
                $event_id = Tbl_event_registration::orderBy('id', 'desc')->limit(1)->value('id'); 

                if ($request->has('member_name')) 
                {
                    for ($i=0; $i < count($file['member_name']); $i++) 
                    { 

                        $image = $file['member_image'][$i];
                        $new_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('user_id_picture'), $new_name);

                        $members = [
                            'member_name' => $file['member_name'][$i],
                            'member_id_picture' => $new_name,
                            'tbl_event_registration_id'  => $event_id,
                        ];

                        Tbl_event_member::create($members);
                    }
                    $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' registered in Dance Revolution.'];
                    event(new NotificationEvent($text));

                    return response()->json(['success' => 'This group are now registered, We will review your informaton, please wait for the response.' ]);
                }
                return response()->json(['error' => 'error!']);
            }
            else
            {
                $rules = array(
                    'name_of_group' =>  'required',
                );
                $error = Validator::make($request->all(), $rules);

                if($error->fails())
                {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $form_data = array(
                        'name_of_group' => $request->name_of_group,
                        'tbl_event_id' => 6
                );

                Tbl_event_registration::whereId($register_id)->update($form_data);

                $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' updated group name in Dance Revolution.'];
                event(new NotificationEvent($text));

                return response()->json(['success' => 'This group are now updated, We will review your informaton, please wait for the response.']);
            }
        }

        else{

            return response()->json(['sorry' => 'Sorry, registration is currently closed!']);

        }
        
    }

     public function addnewmember(Request $request)
    {
        $eventStatus = Tbl_event::where('id', 6)->value('event_status');
        if($eventStatus == 'open')
        {
            $year = now('Asia/Manila')->year;
            $register_id = Tbl_event_registration::where('user_id', auth()->id())
                ->where('created_at', 'LIKE', ''. $year . '%')
                ->where('tbl_event_id', 6)
                ->value('id');
            $countmember = Tbl_event_member::where('Tbl_event_registration_id', $register_id)->count();

            if($countmember >=20)
            {
                return response()->json(['sorry' => 'Member maximum of 20 person only' ]);
            }
            else
            {
                $rules = array(
                'new_member_name'         =>  'required',
                'new_member_id_picture'    =>  'required|image',
                );

                $error = Validator::make($request->all(), $rules);

                if($error->fails())
                {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image = $request->file('new_member_id_picture');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('user_id_picture'), $new_name);
                
                $form_data = array(
                    'member_name'         => $request->new_member_name,
                    'member_id_picture'   =>  $new_name,
                    'tbl_event_registration_id' => $register_id,
                );
                Tbl_event_member::create($form_data);

                $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' add member in Dance Revolution.'];
                event(new NotificationEvent($text));

                return response()->json(['success' => 'Successfully added new member']);
            }
        }
        else
        {
           return response()->json(['sorry' => 'Sorry, registration is currently closed!']); 
        }
        
    }
    

   
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Tbl_event_member::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }
    
    public function update(Request $request)
    {
        $eventStatus = Tbl_event::where('id', 6)->value('event_status');
        if($eventStatus == 'open')
        {
            $image_name = $request->hidden_image;
            $image = $request->file('id_picture');
             if($image != '')
             {
                $rules = array(
                    'member_name'    =>  'required',
                    'id_picture'         =>  'image'
                );
                $error = Validator::make($request->all(), $rules);
                if($error->fails())
                {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('user_id_picture'), $image_name);
            }
            else
            {
                 $rules = array(
                    'member_name'    =>  'required',
                 );

                $error = Validator::make($request->all(), $rules);

                if($error->fails())
                {
                    return response()->json(['errors' => $error->errors()->all()]);
                }
            }
            $form_data = array(
                'member_name'   =>   $request->member_name,
                'member_id_picture'    =>   $image_name
            );

            $year = now('Asia/Manila')->year;
            $register_id = Tbl_event_registration::where('user_id', auth()->id())
                ->where('created_at', 'LIKE', ''. $year . '%')
                ->where('tbl_event_id', 6)
                ->value('id');


            $data = Tbl_event_member::where('id', $request->hidden_id)
                ->where('tbl_event_registration_id', $register_id)
                ->firstOrFail();

            Tbl_event_member::whereId($request->hidden_id)->update($form_data);

            $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' updated member data in Dance Revolution.'];
            event(new NotificationEvent($text));

            return response()->json(['success' => 'Member Successfully Updated']);


        }
       else

       {
         return response()->json(['sorry' => 'This event is already closed' ]);
       }
        
       
    }

   
    public function destroy(Request $request, $id)
    {

        $eventStatus = Tbl_event::where('id', 6)->value('event_status');
        if($eventStatus == 'open')
        {
           $year = now('Asia/Manila')->year;
           $register_id = Tbl_event_registration::where('user_id', auth()->id())
                ->where('created_at', 'LIKE', ''. $year . '%')
                ->where('tbl_event_id', 6)
                ->value('id');
            $countmember = Tbl_event_member::where('Tbl_event_registration_id', $register_id)->count();

            if($countmember <=8)
            {
                return response()->json(['sorry' => 'Member should atleast 8 person' ]);
            }
            else{
                $data = Tbl_event_member::where('id', $id)
                ->where('tbl_event_registration_id', $register_id)
                ->firstOrFail();
                $data->delete();

                $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' deleted a member in Dance Revolution.'];
                event(new NotificationEvent($text));
                return response()->json(['success' => 'Something']); 
            }
            
        }

        else
           {
            return response()->json(['sorry' => 'This event is already closed' ]);
           }
        
        
    }
}
