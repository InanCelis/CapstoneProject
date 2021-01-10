<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_outside_event;
use App\Tbl_event;
use Validator;
use Carbon\Carbon;
use App\Events\NotificationEvent;
use Nexmo\Laravel\Facade\Nexmo;
use Dirape\Token\Token;
use PDF;
use Auth;
use App\Tbl_fetchyear;
use App\Tbl_pdf_header;
use App\Tbl_yda_head;
use App\User;
use App\Helpers\NotificationHelper;

class OutsideEventController extends Controller
{
    public function color_run_index()
    {
    	$notifications = NotificationHelper::notification();
    	$event_status = Tbl_event::where('id', 2)->value('event_status');
    	$user = User::where('id', auth()->id())->get();

    	$fb_share_link = [
            "title" => 'YOUTH DEVELOPMENT AFFAIRS OFFICE OF LAGUNA',
            "description" => '',
            "url" => '',
            "published_time" => '',
            "modified_time" => '',
            "updated_time" => '',
            "image" => 'public/pageicon/yda.png',
            "secure_url" => '',
        ];

    	return view('/color-run-registration', compact('event_status', 'user','notifications','fb_share_link'))->with('pagename', 'Anilag Color Run Registration');
    }
    public function color_run_register(Request $request)
    {
    	
	    	$check = Tbl_event::where('id', 2)->value('event_status');

	    	if($check == 'open')
	    	{
	    		$this->validate($request,
				[
					'first_name'	=> 'required|string|max:100',
					'middle_name'	=> 'required|string|max:100',
					'last_name'		=> 'required|string|max:100',
					'barangay'		=> 'required|max:100',
					'municipality'	=> 'required|max:100',
					'province'		=> 'required|max:100',
					'contact'		=> 'required|numeric|digits:11|regex:/(09)[0-9]{9}/',
					'birthdate'		=> 'required|before:4 years ago',
					'birthplace'	=> 'required|max:100',
					'terms'			=> 'required|in:1',
				]);

	    		$cont = $request->contact;
		        $contact = ltrim($cont, '0');
		        $finalcontact = '+63'.$contact;

		        $token = new Token();
	       		$token = str_random(50);

		        $year = now('Asia/Manila')->year;
		        $checkinevent = Tbl_outside_event::where('contact', $finalcontact)->where('created_at', 'LIKE', ''. $year . '%')->where('tbl_event_id', 2)->get();

		        if(count($checkinevent))
		        {
		        	return redirect('/anilag-color-run/register')->with('error', 'Your contact number is already used.');
		        }
		        else
		        {
		        	try
		       		{
		       			Nexmo::message()->send([
					    'to'   =>  $finalcontact,
					    'from' =>  'YDA Laguna',
					    'text' =>  'Download your pdf form in this link. http://ydalaguna.co/anilag-color-run/applicant/'.$token,
						]);

			        	$data = [
							'first_name'	=> $request->first_name,
							'middle_name'	=> $request->middle_name,
							'last_name'		=> $request->last_name,
							'barangay'		=> $request->barangay,
							'municipality'	=> $request->municipality,
							'province'		=> $request->province,
							'contact'		=> $finalcontact,
							'birthdate'		=> $request->birthdate,
							'birthplace'	=> $request->birthplace,
							'token'			=> $token,
							'tbl_event_id'	=> 2,
						];

						Tbl_outside_event::create($data);

						$text = ['event' => 'New applicant registered in Anilag Color Run.'];
                    	event(new NotificationEvent($text));

						return redirect('/anilag-color-run/register')->with('success', 'Successfully registered, We will send an sms notification to verify your number and to get your form.');
		       		}
		       		catch(\Exception $e)
		    		{
		    			return redirect('/anilag-color-run/register')->with('error', 'Registration not submitted please try again or contact us about this problem.');
		   			}
		        }
	        	
	    	}
	    	else
	    	{
	    		return redirect('/anilag-color-run/register')->with('closed', 'Sorry, registration is currently closed!');
	    	}
    }

    public function color_run_pdf($token)
    {
    	$colorun = Tbl_outside_event::where('token', $token)->where('tbl_event_id', 2)->get();

    	if(count($colorun))
    	{	
    		Tbl_outside_event::where('token', $token)->where('tbl_event_id', 2)->update(['status' => 1]);

    		$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
	        $ydahead = Tbl_yda_head::where('id', 1)->get();
	        $event_id = 2;
		    $event_name = ['name' => 'ANILAG COLOR RUN'];
			$year = now('Asia/Manila')->year;

	        $pdf = PDF::loadView('/outside_event', compact('colorun','dataImage','ydahead','event_name','year','event_id'));
	    	$pdf->setPaper('letter', 'portrait', 'arial');
	    	return $pdf->stream('anilag-color-run.pdf');
    	}
    	else
    	{
    		abort(404);
    	}
    }
    
    public function cosplay_index()
    {
    	$notifications = NotificationHelper::notification();
    	$event_status = Tbl_event::where('id', 3)->value('event_status');
    	$user = User::where('id', auth()->id())->get();

    	$fb_share_link = [
            "title" => '',
            "description" => '',
            "url" => '',
            "published_time" => '',
            "modified_time" => '',
            "updated_time" => '',
            "image" => '',
            "secure_url" => '',
        ];
        
    	return view('/cosplay-registration', compact('event_status','user','notifications','fb_share_link'))->with('pagename', 'Anilag Cosplay Competition Registration');
    }

    public function cosplay_register(Request $request)
    {
    	$check = Tbl_event::where('id', 3)->value('event_status');

	    	if($check == 'open')
	    	{
	    		$this->validate($request,
				[
					'first_name'	=> 'required|string|max:100',
					'last_name'		=> 'required|string|max:100',
					'nick_name'		=> 'required|string|max:100',
					'barangay'		=> 'required|max:100',
					'municipality'	=> 'required|max:100',
					'province'		=> 'required|max:100',
					'contact'		=> 'required|numeric|digits:11|regex:/(09)[0-9]{9}/',
					'birthdate'		=> 'required|before:4 years ago',
					'birthplace'	=> 'required|max:100',
				]);

	    		$cont = $request->contact;
		        $contact = ltrim($cont, '0');
		        $finalcontact = '+63'.$contact;

		        $token = new Token();
	       		$token = str_random(50);

		        $year = now('Asia/Manila')->year;
		        $checkinevent = Tbl_outside_event::where('contact', $finalcontact)->where('created_at', 'LIKE', ''. $year . '%')->where('tbl_event_id', 3)->get();

		        if(count($checkinevent))
		        {
		        	return redirect('/anilag-cosplay/register')->with('error', 'Your contact number is already used.');
		        }
		        else
		        {
		        	try
		       		{
		       			Nexmo::message()->send([
					    'to'   =>  $finalcontact,
					    'from' =>  'YDA Laguna',
					    'text' =>  'Download your pdf form in this link.  http://ydalaguna.co/anilag-cosplay/applicant/'.$token,
						]);

			        	$data = [
							'first_name'	=> $request->first_name,
							'last_name'		=> $request->last_name,
							'nick_name'		=> $request->nick_name,
							'barangay'		=> $request->barangay,
							'municipality'	=> $request->municipality,
							'province'		=> $request->province,
							'contact'		=> $finalcontact,
							'birthdate'		=> $request->birthdate,
							'birthplace'	=> $request->birthplace,
							'token'			=> $token,
							'tbl_event_id'	=> 3,
						];

						Tbl_outside_event::create($data);

						$text = ['event' => 'New applicant registered in Anilag Cosplay Competition.'];
                    	event(new NotificationEvent($text));

						return redirect('/anilag-cosplay/register')->with('success', 'Successfully registered, We will send an sms notification to verify your number and to get your form.');
		       		}
		       		catch(\Exception $e)
		    		{
		    			return redirect('/anilag-cosplay/register')->with('error', 'Registration not submitted please try again or contact us about this problem.');
		   			}
		        }
	        	
	    	}
	    	else
	    	{
	    		return redirect('/anilag-cosplay/register')->with('closed', 'Sorry, registration is currently closed!');
	    	}
    }
    
    public function cosplay_pdf($token)
    {
    	$cosplay = Tbl_outside_event::where('token', $token)->where('tbl_event_id', 3)->get();

    	if(count($cosplay))
    	{	
    		Tbl_outside_event::where('token', $token)->where('tbl_event_id', 3)->update(['status' => 1]);

    		$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
	        $ydahead = Tbl_yda_head::where('id', 1)->get();
	        $event_id = 3;
		    $event_name = ['name' => 'ANILAG COSPLAY COMPETITION'];
			$year = now('Asia/Manila')->year;

	        $pdf = PDF::loadView('/outside_event', compact('cosplay','dataImage','ydahead','event_name','year','event_id'));
	    	$pdf->setPaper('letter', 'portrait', 'arial');
	    	return $pdf->stream('anilag-color-run.pdf');
    	}
    	else
    	{
    		abort(404);
    	}
    }

}
