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

class LagunaLesbianKingController extends Controller
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
        ->where('tbl_event_id', 8)
        ->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 8)
        ->where('event_registration_status', 2)
        ->get();

        $event_status = Tbl_event::where('id', 8)->value('event_status');

        return view('userpage.laguna_lesbian_king', compact('user', 'registeruser', 'event_user_status','event_status','notifications'))->with('pagename', 'Laguna Lesbian King');
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
        ->where('id', 8)
        ->value('event_status');

        $birthdate = User::where('id', auth()->id())->value('birthdate');
        $age = \Carbon\Carbon::parse($birthdate)->age;

        if($age >= 18 && $age <=35)
        {

       
                if($eventStatus == 'open')
                {

                    $year = now('Asia/Manila')->year;
                    $register_id = Tbl_event_registration::where('user_id', auth()->id())
                    ->where('created_at', 'LIKE', ''. $year . '%')
                    ->where('tbl_event_id', 8)
                    ->value('id');


                if ($register_id === null) 
                {
                   
                    $rules = array(
                        'id_picture'    =>  'required|image',
                        'height' => 'required|numeric',
                        'weight' => 'required|numeric',
                        'color_of_hair' => 'required',
                        'color_of_eyes' => 'required',
                        'special_hobbies' => 'required',
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
                        'height' => $request->height,
                        'weight' => $request->weight,
                        'color_of_hair' => $request->color_of_hair,
                        'color_of_eyes' => $request->color_of_eyes,
                        'special_hobbies' => $request->special_hobbies,
                        'employer' => $request->employer,
                        'degree' => $request->degree,
                        'father_name' => $request->father_name,
                        'father_occupation' => $request->father_occupation,
                        'mother_name' => $request->mother_name,
                        'mother_occupation' => $request->mother_occupation,
                        'wish_to_join' => $request->wish_to_join,
                        'tbl_event_id' => 8
                    );

                    Tbl_event_registration::create($form_data + ['user_id' => auth()->id()]);

                    $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' registered in Laguna Lesbian King.'];
                    event(new NotificationEvent($text));

                    return response()->json(['success' => 'You are now registered, We will review your informaton, please wait for the response.']);

                }
                 else
                 {
                   $rules = array(
                        'height' => 'required|numeric',
                        'weight' => 'required|numeric',
                        'color_of_hair' => 'required',
                        'color_of_eyes' => 'required',
                        'special_hobbies' => 'required',
                    );

                    $error = Validator::make($request->all(), $rules);

                    if($error->fails())
                    {
                        return response()->json(['errors' => $error->errors()->all()]);
                    }

                    if($request->has('id_picture'))
                    {
                        $image = $request->file('id_picture');
                        $new_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('user_id_picture'), $new_name);

                         $form_data = array(
                        
                        'id_picture'   =>  $new_name,
                        'height' => $request->height,
                        'weight' => $request->weight,
                        'color_of_hair' => $request->color_of_hair,
                        'color_of_eyes' => $request->color_of_eyes,
                        'special_hobbies' => $request->special_hobbies,
                        'employer' => $request->employer,
                        'degree' => $request->degree,
                        'father_name' => $request->father_name,
                        'father_occupation' => $request->father_occupation,
                        'mother_name' => $request->mother_name,
                        'mother_occupation' => $request->mother_occupation,
                        'wish_to_join' => $request->wish_to_join,
                        'tbl_event_id' => 8
                        );
                    }
                    else
                    {
                        $form_data = array(
                        
                        'height' => $request->height,
                        'weight' => $request->weight,
                        'color_of_hair' => $request->color_of_hair,
                        'color_of_eyes' => $request->color_of_eyes,
                        'special_hobbies' => $request->special_hobbies,
                        'employer' => $request->employer,
                        'degree' => $request->degree,
                        'father_name' => $request->father_name,
                        'father_occupation' => $request->father_occupation,
                        'mother_name' => $request->mother_name,
                        'mother_occupation' => $request->mother_occupation,
                        'wish_to_join' => $request->wish_to_join,
                        'tbl_event_id' => 8 
                        );
                    }

                    Tbl_event_registration::whereId($register_id)->update($form_data);
                    
                   
                    $text = ['event' => auth()->user()->first_name.' '.auth()->user()->last_name.' updated data in Laguna Lesbian King.'];
                    event(new NotificationEvent($text));

                    return response()->json(['success' => 'You are now registered and updated your id picture, We will review your informaton, please wait for the response.']);
                     
                 } 
                }

                else
                {

                    return response()->json(['sorry' => 'Sorry, registration is currently closed!']);

                }

        }

        else
        {
            return response()->json(['sorry' => 'Your age is not allowed in this event!']);
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
