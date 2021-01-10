<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\User;
use App\Tbl_event_registration;
use App\Tbl_event;
use Validator;
use App\Tbl_pdf_header;
use App\Tbl_fetchyear;
use Carbon\Carbon;
use App\Tbl_yda_head;

class GenerateReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function eventForauditionReport($id)
    {
    	$checkEvent = Tbl_event::where('id', $id)->get();
    	if(count($checkEvent))
    	{
    		foreach ($checkEvent as  $value) {}

    		$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
	        $ydahead = Tbl_yda_head::where('id', 1)->get();

	        if($id == 5 || $id == 6)
	        {
	        	$pdf_id = 3;
	        }
	        else
	        {
	        	$pdf_id = 1;
	        }
	        
	        $year = Tbl_fetchyear::where('id', 1)->value('year');
	        $event_name = ['name' => $value->event_name .' '. $year];
	        
	        $event_registered = Tbl_event_registration::where('tbl_event_id', $id)
	        ->where('created_at', 'LIKE', ''. $year . '%')
	        ->where('event_registration_status', 2)
	        ->get();

	        $pdf = PDF::loadView('/admin.generate_report', compact('dataImage', 'ydahead', 'event_name', 'pdf_id','event_registered'));
	        $pdf->setPaper('letter', 'portrait', 'arial');
	        return $pdf->stream('muralart.pdf');
    	}
    	else
    	{
    		abort(404);
    	}
    	
    }

    public function eventcontestantReport($id)
    {
    	$checkEvent = Tbl_event::where('id', $id)->get();
    	if(count($checkEvent))
    	{
    		foreach ($checkEvent as  $value) {}

    		$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
	        $ydahead = Tbl_yda_head::where('id', 1)->get();

	        if($id == 5 || $id == 6)
	        {
	        	$pdf_id = 4;
	        }
	        else
	        {
	        	$pdf_id = 2;
	        }
	        
	        $year = Tbl_fetchyear::where('id', 1)->value('year');
	        $event_name = ['name' => $value->event_name .' '. $year];
	        
	        $event_registered = Tbl_event_registration::where('tbl_event_id', $id)
	        ->where('created_at', 'LIKE', ''. $year . '%')
	        ->where('event_registration_status', 3)
	        ->get();

	        $pdf = PDF::loadView('/admin.generate_report', compact('dataImage', 'ydahead', 'event_name', 'pdf_id','event_registered'));
	        $pdf->setPaper('letter', 'portrait', 'arial');
	        return $pdf->stream('muralart.pdf');
    	}
    	else
    	{
    		abort(404);
    	}
    	
    }
    
}
