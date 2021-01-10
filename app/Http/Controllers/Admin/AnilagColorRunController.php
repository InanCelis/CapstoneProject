<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tbl_fetchyear;
use App\Tbl_outside_event;
use App\Tbl_event_registration;
use Carbon\Carbon; 
use PDF;
use App\Tbl_pdf_header;
use App\Tbl_yda_head;
use App\Helpers\NotificationHelper;

class AnilagColorRunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $notifications = NotificationHelper::notification();
    	$year = Tbl_fetchyear::value('year');

        $event = Tbl_outside_event::where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 2)
        ->orderBy('updated_at', 'desc')
        ->get();
    

       
        return view('admin.anilag_color_run', compact('year', 'event', 'notifications'))->with('pagename', 'Anilag Color Run');   
    }

    public function colorrunpdf($id)
    {
    	$colorun = Tbl_outside_event::where('id', $id)->where('tbl_event_id', 2)->get();

    	if(count($colorun))
    	{	
    		
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
    		abort(403);
    	}
    }
}
