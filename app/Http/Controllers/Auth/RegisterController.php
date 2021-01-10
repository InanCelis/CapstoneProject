<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Tbl_address;
use App\Tbl_barangay;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'nick_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:Male,Female'],
            'civil_status' => ['required', 'string', 'in:Single,Married,Divorced,Separated,Widowed'],
            'birthdate'=> ['required', 'before:4 years ago'],
            'birthplace' => ['required', 'string', 'max:255'],
            'telephone_number',
            'citizenship',
            'barangay'=> ['required'],
            'town'=> ['required'],
            'contact'=> ['required','numeric','regex:/^(\+639)\d{9}$/','unique:users'],
            'username' => ['required','regex:/^[a-zA-Z0-9]*$/', 'min:8', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]); 
      
        


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    try
    {
        $input = array("bg-default", "bg-primary", "bg-info", "bg-success", "bg-danger", "bg-warning", "bg-dark");
        $rand_keys = array_rand($input, 2);


        $barangay_id = Tbl_barangay::where('id', $data['barangay'])->value('id');

        $verify_barangay_id = Tbl_barangay::findOrFail($barangay_id);

        

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
        $number_code = str_shuffle($pin);

        

        $userCreate = User::create([
                    'first_name' => $data['first_name'],
                    'middle_name' => $data['middle_name'],
                    'last_name' => $data['last_name'],
                    'nick_name' => $data['nick_name'],
                    'gender' => $data['gender'],
                    'civil_status' => $data['civil_status'],
                    'birthdate' => $data['birthdate'],
                    'birthplace' => $data['birthplace'],
                    'telephone_number' => $data['telephone_number'],
                    'citizenship' => $data['citizenship'],
                    'contact' => $data['contact'],
                    'number_code' => $number_code,
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'color_profile'=> $input[$rand_keys[0]],
                ]);

            $id = User::where('email', $data['email'])->value('id');

            

            Tbl_address::create([
                'user_id' => $id,
                'tbl_barangay_id' => $barangay_id,
            ]);
             
            Nexmo::message()->send([
            'to'   =>  $data['contact'],
            'from' =>  'YDA Laguna',
            'text' =>  'To verify your account, please click this link http://ydalaguna.co/code/'.$number_code
            ]);


        return $userCreate;

    }
    catch(\Exception $e)
    {
        return redirect('/login')->with('error', 'Registration failed, contact the office about this problem.');
    }


    }
}
