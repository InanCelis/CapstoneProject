<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Tbl_address;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'id' 				=>1,
        	'first_name'		=>'Ferdinand',
        	'middle_name'		=>'Tadique',
        	'last_name'			=>'Celis',
        	'nick_name'			=>'Inan',
        	'gender'			=>'Male',
        	'civil_status'		=>'Single',
        	'birthdate'			=>'1998-09-04',
        	'birthplace'		=>'Ligao, Albay',
        	'citizenship'		=>'Filipino',
        	'profile_picture'   =>'none',
        	'email'				=>'celisinan@gmail.com',
        	'contact'			=>'+639268421554',
        	'number_verified'	=>1,
        	'number_code'		=>'65788G542234495',
        	'username'			=>'inancelis',
        	'password'			=>'$2y$10$CcBpD68gRr.RTT82keynXu2c3O5UhkAak2kk5u1qYSh8fALTCsVPq',
        	'color_profile'		=>'bg-default',
        	'usertype'			=>1,
        	'status'			=>1,
        ]);


        Tbl_address::create([
        	'id' 				=> 1,
        	'user_id'			=> 1,
        	'tbl_barangay_id'	=> 78,
        ]);
    }
}
