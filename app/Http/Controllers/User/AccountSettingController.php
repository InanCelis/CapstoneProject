<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
Use App\User;
use App\Tbl_town;
use App\Tbl_barangay;
use Validator;
use Auth;
use App\Tbl_address;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;

class AccountSettingController extends Controller
{
   public function __construct()
   {
        $this->middleware('auth');
   }

   public function index()
   {
     $notifications = NotificationHelper::notification();
   	 $user = User::where('id', auth()->id())->get();
   	 $towns = Tbl_town::all();

   	 return view('userpage.account_setting', compact('user', 'towns','notifications'))->with('pagename', 'Account Setting');
   }
   
   public function update_username(Request $request, $id)
   {
    if($id == auth()->id())
    {
      $rules = array(
        'username' => ['required','regex:/^[a-zA-Z0-9]*$/', 'min:8', 'max:255', 'unique:users'],
       );

      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
        return response()->json(['errors' => $error->errors()->all()]);
      }
      User::where('id', auth()->id())->update(['username' => $request->username]);
      Session::flash('success_username', 'Successfully updated!');
      return response()->json(['success' => $id]);
    }
    else
    {
     return response()->json(['sorry' => 'Access Denied!']);
    }

   }
   
   public function update_password(Request $request, $id)
   {
    if($id == auth()->id())
    {
      $rules = array(
        'old_password' => 'required',
        'password'     => 'required|string|min:8|confirmed',
       );

      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
        return response()->json(['errors' => $error->errors()->all()]);
      }
      
      $old = Auth::User()->password;
      if(Hash::check($request->old_password, $old))
      { 
        User::where('id', auth()->id())->update(['password' => Hash::make($request->password)]);
        Session::flash('success_password', 'Successfully updated!');
        return response()->json(['success' => 'success']);
      }
      else
      {
        return response()->json(['mali' => 'Incorrect old password.']);
      }
      
      
    }
    else
    {
     return response()->json(['sorry' => 'Access Denied!']);
    }
   }
   public function update_info(Request $request, $id)
   {
   	if($id == auth()->id())
    {
	     $rules = array(
		    'first_name'     => ['required', 'string',  'max:255'],
        'middle_name'    => ['required', 'string', 'max:255'],
        'last_name'      => ['required', 'string', 'max:255'],
        'nick_name'      => ['required', 'string', 'max:255'],
        'gender'         => ['required', 'string', 'in:Male,Female'],
        'civil_status'   => ['required', 'string', 'in:Single,Married,Divorced,Separated,Widowed'],
        'birthdate'      => ['required', 'before:4 years ago'],
        'birthplace'     => ['required', 'string', 'max:255'],
        'barangay'       => ['required'],
        'town'           => ['required'],
		   );

		    $error = Validator::make($request->all(), $rules);
		    if($error->fails())
		    {
		      return response()->json(['errors' => $error->errors()->all()]);
		    }
      $data = [
        'first_name'     => $request->first_name, 
        'middle_name'    => $request->middle_name,
        'last_name'      => $request->last_name,
        'nick_name'      => $request->nick_name,
        'gender'         => $request->gender,
        'civil_status'   => $request->civil_status,
        'birthdate'      => $request->birthdate,
        'birthplace'     => $request->birthplace,
        'telephone_number'=> $request->telephone_number,
        'citizenship'    => $request->citizenship,
        'work'           => $request->work,
        'work_position'  => $request->work_position,
        'school'         => $request->school,
        'bio'            => $request->bio,
      ];

      User::where('id', auth()->id())->update($data);

      $address = [
        'tbl_barangay_id'=> $request->barangay,
      ];

      Tbl_address::where('user_id', auth()->id())->update($address);

      Session::flash('success', 'Successfully updated!');
   	  return response()->json(['success' => $id]);
   	}
   	else
   	{
   	 return response()->json(['sorry' => 'Access Denied!']);
   	}
   }

   public function get_barangays(Request $request, $id)
    {
        if ($request->ajax()){
            $barangays = Tbl_barangay::where('tbl_town_id', $id)->get();
            
            $output ='<option disabled="" selected="">- Barangay -</option>';
            foreach ($barangays as $barangay) {
            $output .='<option value="'. $barangay ->id .'">'. $barangay->barangay_name .'</option>';
            }
            
            return response()->json(['data' => $output]);
        }
    }

    
     public function get_auth_to_reset_password($id)
    {
        if($id == auth()->id())
        {
          $user = User::where('id', auth()->id())->get();
          return view('forgot_password', compact('user')); 
          
        }
        else
        {
          return response()->json('Access Denied');
        }
           
            
       
        
    }
}
