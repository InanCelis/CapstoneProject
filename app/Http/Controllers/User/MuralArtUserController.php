<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tbl_event_registration;
use App\Tbl_event;
use Validator;
use App\Events\NotificationEvent; 
use App\Helpers\NotificationHelper;

class MuralArtUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 

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
        ->where('tbl_event_id', 1)
        ->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 1)
        ->where('event_registration_status', 2)
        ->get();
        
        $event_status = Tbl_event::where('id', 1)->value('event_status');


        return view('userpage.mural_art', compact('user', 'registeruser', 'event_user_status','event_status','notifications'))->with('pagename', '3D Mural Art');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $eventStatus = Tbl_event::select('event_status')
        ->where('id', 1)
        ->value('event_status');

        if($eventStatus == 'open'){

            $year = now('Asia/Manila')->year;
            $register_id = Tbl_event_registration::where('user_id', auth()->id())
            ->where('created_at', 'LIKE', ''. $year . '%')
            ->where('tbl_event_id', 1)
            ->value('id');

           if ($register_id === null) {

            $rules = array(
                'id_picture'    =>  'required|image'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image = $request->file('id_picture');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('user_id_picture'), $new_name);
            
            $form_data = array(
                
                'id_picture'   =>  $new_name,
                'tbl_event_id' => 1
            );

            Tbl_event_registration::create($form_data + ['user_id' => auth()->id()]);


            $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' registered in 3D Mural Art.'];
            event(new NotificationEvent($text));

            return response()->json(['success' => 'You are now registered, We will review your informaton, please wait for the response.']);

         }
         else{
            $rules = array(
                'id_picture'    =>  'required|image'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

             $image = $request->file('id_picture');

            $new_name = rand() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('user_id_picture'), $new_name);

            $form_data = array(
                
                'id_picture'   =>  $new_name,
                'tbl_event_id' => 1
            );

            Tbl_event_registration::whereId($register_id)->update($form_data);
            
            $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' Updated data in 3D Mural Art.'];
            event(new NotificationEvent($text));

            return response()->json(['success' => 'You are now registered and updated your id picture, We will review your informaton, please wait for the response.']);
             
         } 
        }

        else{

            return response()->json(['sorry' => 'Sorry, registration is currently closed!']);

        }
        

        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
