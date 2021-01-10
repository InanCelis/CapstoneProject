<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use App\Tbl_tesda_registration;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;

class TesdaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //status of it trainee
        // 1 - pending
        // 2 - on training
        // 3 - incomplete
        // 4 - completed
        $notifications = NotificationHelper::notification();
    	$user = User::where('id', auth()->id())->get();

    	$registered_tesda = Tbl_tesda_registration::where('user_id', auth()->id())->get();

    	return view('userpage.tesda', compact('user','registered_tesda','notifications'))->with('pagename', 'IT Training Program');
    }

    public function store(Request $request)
    {

    	$registered_tesda = Tbl_tesda_registration::where('user_id', auth()->id())->get();

    	if(count($registered_tesda) == 0)
    	{
    		$rules = array(
    			'schedule'			=> 'required|in:Weekend,Weekdays',
    			'picture'			=> 'required|image',
    			'adobe_premiere'	=> 'required|in:1,2,3,4,5|numeric',
    			'adobe_photoshop'	=> 'required|in:1,2,3,4,5|numeric',
    			'powerpoint'		=> 'required|in:1,2,3,4,5|numeric',
    			'microsoft_excel'	=> 'required|in:1,2,3,4,5|numeric',
    			'microsoft_office'	=> 'required|in:1,2,3,4,5|numeric',
    			'student_or_out_of_school' => 'required|in:Student,Out of School',
    			'contact_address'	=> 'required',
                'contact_person'	=> 'required'
				
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }


            $image = $request->file('picture');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('tesda_pictures'), $new_name);

            $form_data = array(
            	'elementary_name'	 	=>	$request->elementary_name,
            	'elementary_year'	 	=>	$request->elementary_year,
            	'elementary_academic'	=>	$request->elementary_academic,
            	'secondary_name'		=>	$request->secondary_name,
            	'secondary_year'		=>	$request->secondary_year,
            	'secondary_academic'	=>	$request->secondary_academic,
            	'vocational_name'		=>	$request->vocational_name,
            	'vocational_year'		=>	$request->vocational_year,
            	'vocational_academic'	=>	$request->vocational_academic,
            	'college_name'			=>	$request->college_name,
            	'college_year'			=>	$request->college_year,
            	'college_academic'		=>	$request->college_academic,
            	'contact_person'		=>	$request->contact_person,
            	'contact_address'		=>	$request->contact_address,
            	'student'				=>	$request->student_or_out_of_school,
            	'microsoft_office'		=>	$request->microsoft_office,
            	'microsoft_excel'		=>	$request->microsoft_excel,
            	'powerpoint'			=>	$request->powerpoint,
            	'adobe_photoshop'		=>	$request->adobe_photoshop,
            	'adobe_premiere'		=>	$request->adobe_premiere,
            	'other_specify'			=>	$request->other_specify,
            	'user_picture'			=>	$new_name,
            	'schedule'				=>	$request->schedule,
            );

            Tbl_tesda_registration::create($form_data + ['user_id' => auth()->id()]);

            $text = ['tesda' => auth()->user()->first_name.' '.auth()->user()->last_name.' registered in IT training program.'];
            event(new NotificationEvent($text));

    		return response()->json(['success' => 'You are now registered, please']);
    	}
    	else
    	{
    	
            $rules = array(
                'schedule'          => 'required|in:Weekend,Weekdays',
                'adobe_premiere'    => 'required|in:1,2,3,4,5|numeric',
                'adobe_photoshop'   => 'required|in:1,2,3,4,5|numeric',
                'powerpoint'        => 'required|in:1,2,3,4,5|numeric',
                'microsoft_excel'   => 'required|in:1,2,3,4,5|numeric',
                'microsoft_office'  => 'required|in:1,2,3,4,5|numeric',
                'student_or_out_of_school' => 'required|in:Student,Out of School',
                'contact_address'   => 'required',
                'contact_person'    => 'required'
                
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            if($request->has('picture'))
            {
                $image = $request->file('picture');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('tesda_pictures'), $new_name);

                $form_data = array(
                    'elementary_name'       =>  $request->elementary_name,
                    'elementary_year'       =>  $request->elementary_year,
                    'elementary_academic'   =>  $request->elementary_academic,
                    'secondary_name'        =>  $request->secondary_name,
                    'secondary_year'        =>  $request->secondary_year,
                    'secondary_academic'    =>  $request->secondary_academic,
                    'vocational_name'       =>  $request->vocational_name,
                    'vocational_year'       =>  $request->vocational_year,
                    'vocational_academic'   =>  $request->vocational_academic,
                    'college_name'          =>  $request->college_name,
                    'college_year'          =>  $request->college_year,
                    'college_academic'      =>  $request->college_academic,
                    'contact_person'        =>  $request->contact_person,
                    'contact_address'       =>  $request->contact_address,
                    'student'               =>  $request->student_or_out_of_school,
                    'microsoft_office'      =>  $request->microsoft_office,
                    'microsoft_excel'       =>  $request->microsoft_excel,
                    'powerpoint'            =>  $request->powerpoint,
                    'adobe_photoshop'       =>  $request->adobe_photoshop,
                    'adobe_premiere'        =>  $request->adobe_premiere,
                    'other_specify'         =>  $request->other_specify,
                    'user_picture'          =>  $new_name,
                    'schedule'              =>  $request->schedule,
                );
            }
            else
            {
                $form_data = array(
                    'elementary_name'       =>  $request->elementary_name,
                    'elementary_year'       =>  $request->elementary_year,
                    'elementary_academic'   =>  $request->elementary_academic,
                    'secondary_name'        =>  $request->secondary_name,
                    'secondary_year'        =>  $request->secondary_year,
                    'secondary_academic'    =>  $request->secondary_academic,
                    'vocational_name'       =>  $request->vocational_name,
                    'vocational_year'       =>  $request->vocational_year,
                    'vocational_academic'   =>  $request->vocational_academic,
                    'college_name'          =>  $request->college_name,
                    'college_year'          =>  $request->college_year,
                    'college_academic'      =>  $request->college_academic,
                    'contact_person'        =>  $request->contact_person,
                    'contact_address'       =>  $request->contact_address,
                    'student'               =>  $request->student_or_out_of_school,
                    'microsoft_office'      =>  $request->microsoft_office,
                    'microsoft_excel'       =>  $request->microsoft_excel,
                    'powerpoint'            =>  $request->powerpoint,
                    'adobe_photoshop'       =>  $request->adobe_photoshop,
                    'adobe_premiere'        =>  $request->adobe_premiere,
                    'other_specify'         =>  $request->other_specify,
                    'schedule'              =>  $request->schedule,
                );
            }
           

            
            Tbl_tesda_registration::where('user_id', auth()->id())->update($form_data);

            $text = ['tesda' => auth()->user()->first_name.' '.auth()->user()->last_name.' updated data in IT training program.'];
            event(new NotificationEvent($text));

    		return response()->json(['success' => 'Succefully updated']);
    	}

    	
    }
    public function removeremarks(Request $request)
    {
        if($request->ajax())
        {
            Tbl_tesda_registration::where('user_id', auth()->id())->update(['remarks' => null ]);
            return response()->json(['success' => '']);
        }
        else
        {
            abort(404);
        }
        
    }
    
}
