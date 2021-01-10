<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\User;
use App\Tbl_event_registration;
use App\Tbl_event;
use Validator;
use App\Tbl_pdf_header;
use App\Tbl_fetchyear;
use App\Tbl_tesda_registration; 
use Carbon\Carbon;
use App\Tbl_yda_head;
use App\Helpers\NotificationHelper;

class PdfController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    //admin pdf generator
    public function admintesdapdf(Request $request, $id)
    {
         //status of it trainee
        // 1 - pending
        // 2 - on training
        // 3 - incomplete
        // 4 - completed
        $user = User::where('id', $id)->get();

        $registered_tesda = Tbl_tesda_registration::where('user_id', $id)->get();  

        $pdf = PDF::loadView('/tesda_pdf', compact('user','registered_tesda'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('it-training.pdf'); 
    }
    
    //tesda
    public function tesdapdf()
    {
        //status of it trainee
        // 1 - pending
        // 2 - on training
        // 3 - incomplete
        // 4 - completed
        $user = User::where('id', auth()->id())->get();

        $registered_tesda = Tbl_tesda_registration::where('user_id', auth()->id())->get();  

        $pdf = PDF::loadView('/tesda_pdf', compact('user','registered_tesda'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('it-training.pdf'); 
    }

    


    //admin pdf generator
    public function adminmuralartpdf(Request $request, $id)
    {
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 1;
        $event_name = ['name' => '3D MURAL ART COMPETITION'];
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $user = User::where('id', $id)->get();

        $event_user_status = 2;

        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'ydahead', 'event_name', 'pdf_id', 'event_user_status'));
        $pdf->setPaper('letter', 'portrait', 'arial');
        return $pdf->stream('muralart.pdf');
    }
    //end admin pdf generator



    public function Admingayqueenpdf(Request $request, $id)
    {   
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 2;
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $event_name = ['name' => 'LAGUNA GAY QUEEN '. $year];
        
        $user = User::where('id', $id)->get();

        $registeruser = Tbl_event_registration::where('user_id', $id)
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 7)
        ->get();

        $event_user_status = 2; 
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status', 'registeruser'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('gayqueen.pdf');
        
    }
 


    public function Adminlesbiankingpdf(Request $request, $id)
    {   
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 2;
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $event_name = ['name' => 'LAGUNA LESBIAN KING '. $year];
        
        $user = User::where('id', $id)->get();

        $registeruser = Tbl_event_registration::where('user_id',$id)
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 8)
        ->get();

        $event_user_status = 2;
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status', 'registeruser'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('lesbianking.pdf');
        
    }

    public function Adminmardigaypdf(Request $request, $id)
    {   
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 1;
        $event_name = ['name' => 'MARDI GAY QUEEN'];
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $user = User::where('id', $id)->get();

        $event_user_status = 2;

        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
        $pdf->setPaper('letter', 'portrait', 'arial');
        return $pdf->stream('mardigay.pdf');
        
    }



    public function Adminwatercolorpdf(Request $request, $id)
    {   
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 1;
        $event_name = ['name' => 'WATER COLOR COMPETITION'];
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $user = User::where('id', $id)->get();

        $event_user_status = 2;
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
        $pdf->setPaper('letter', 'portrait', 'arial');
        return $pdf->stream('watercolor.pdf');
        
    }

    public function Adminbandanilagpdf(Request $request, $id)
    {
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 3;
        $event_name = ['name' => 'BANDANILAG (OPM BATTLE OF THE BANDS)'];
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $user = User::where('id', $id)->get();

        $registeruser = Tbl_event_registration::where('user_id', $id)
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 5)
        ->get();

        $event_user_status = 2;
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status', 'registeruser'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('bandanilag.pdf');
    }


    public function Admindancerevolutionpdf(Request $request, $id)
    {
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 4;
        $event_name = ['name' => 'DANCE REVOLUTION (Inter-Collegiate Dance Battle)'];
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $user = User::where('id', $id)->get();

        $registeruser = Tbl_event_registration::where('user_id', $id)
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 6)
        ->get();
        // dd($registeruser);
        $event_user_status = 2;
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status', 'registeruser'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('dance_revolution.pdf');
    }


    public function Adminanilagsingingidolpdf(Request $request, $id)
    {   
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 1;
        $event_name = ['name' => 'ANILAG SINGING IDOL'];
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $user = User::where('id', $id)->get();

        $event_user_status = 2;

        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
        $pdf->setPaper('letter', 'portrait', 'arial');
        return $pdf->stream('singinidol.pdf');
        
    }

    public function Adminanilagsingingidolkidpdf(Request $request, $id)
    {
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 1;
        $event_name = ['name' => 'ANILAG SINGING IDOL KIDS EDITION'];
        $year = Tbl_fetchyear::where('id', 1)->value('year');
        $user = User::where('id', $id)->get();

        $event_user_status = 2;

        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
        $pdf->setPaper('letter', 'portrait', 'arial');
        return $pdf->stream('singinidol.pdf');
    } 





    //user pdf generator
    public function anilagsingingidolpdf()
    {	
    	$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 1;
        $event_name = ['name' => 'ANILAG SINGING IDOL'];
        $year = now('Asia/Manila')->year;
        $user = User::where('id', auth()->id())->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 4)
        ->where('event_registration_status', 2)
        ->value('event_registration_status');

        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
        $pdf->setPaper('letter', 'portrait', 'arial');
        return $pdf->stream('singinidol.pdf');
    	
    }
    public function anilagsingingidolkidpdf()
    {   
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 1;
        $event_name = ['name' => 'ANILAG SINGING IDOL KIDS EDITION'];
        $year = now('Asia/Manila')->year;
        $user = User::where('id', auth()->id())->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 11)
        ->where('event_registration_status', 2)
        ->value('event_registration_status');

        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
        $pdf->setPaper('letter', 'portrait', 'arial');
        return $pdf->stream('singinidolkid.pdf');
        
    }

    

    public function muralartpdf()
    {	
    	$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
    	$pdf_id = 1;
	    $event_name = ['name' => '3D MURAL ART COMPETITION'];
		$year = now('Asia/Manila')->year;
        $user = User::where('id', auth()->id())->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 1)
        ->where('event_registration_status', 2)
        ->value('event_registration_status');

        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
    	$pdf->setPaper('letter', 'portrait', 'arial');
    	return $pdf->stream('muralart.pdf');
    	
    }

    public function mardigaypdf()
    {	
    	$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
    	$pdf_id = 1;
	    $event_name = ['name' => 'MARDI GAY QUEEN'];
		$year = now('Asia/Manila')->year;
        $user = User::where('id', auth()->id())->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 9)
        ->where('event_registration_status', 2)
        ->value('event_registration_status');

        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
    	$pdf->setPaper('letter', 'portrait', 'arial');
    	return $pdf->stream('mardigay.pdf');
    	
    }

    public function watercolorpdf()
    {	
    	$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
    	$pdf_id = 1;
	    $event_name = ['name' => 'WATER COLOR COMPETITION'];
		$year = now('Asia/Manila')->year;
        $user = User::where('id', auth()->id())->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 10)
        ->where('event_registration_status', 2)
        ->value('event_registration_status');
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status'));
    	$pdf->setPaper('letter', 'portrait', 'arial');
    	return $pdf->stream('watercolor.pdf');
    	
    }

    public function gayqueenpdf()
    {	
    	$dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
    	$pdf_id = 2;
    	$year = now('Asia/Manila')->year;
	    $event_name = ['name' => 'LAGUNA GAY QUEEN '. $year];
		
        $user = User::where('id', auth()->id())->get();

        $registeruser = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 7)
        ->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 7	)
        ->where('event_registration_status', 2)
        ->value('event_registration_status');
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status', 'registeruser'));
    	$pdf->setPaper('legal', 'portrait', 'arial');
    	return $pdf->stream('gayqueen.pdf');
    	
    }

    public function lesbiankingpdf()
    {   
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 2;
        $year = now('Asia/Manila')->year;
        $event_name = ['name' => 'LAGUNA LESBIAN KING '. $year];
        
        $user = User::where('id', auth()->id())->get();

        $registeruser = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 8)
        ->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 8   )
        ->where('event_registration_status', 2)
        ->value('event_registration_status');
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status', 'registeruser'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('lesbianking.pdf');
        
    }

    public function bandanilagpdf()
    {
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 3;
        $event_name = ['name' => 'BANDANILAG (OPM BATTLE OF THE BANDS)'];
        $year = now('Asia/Manila')->year;
        $user = User::where('id', auth()->id())->get();

        $registeruser = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 5)
        ->get();

        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 5)
        ->where('event_registration_status', 2)
        ->value('event_registration_status');
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name','ydahead', 'pdf_id', 'event_user_status', 'registeruser'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('bandanilag.pdf');
    }
    public function dancerevolutionpdf()
    {
        $dataImage = Tbl_pdf_header::where('id', 1)->value('image');
        $ydahead = Tbl_yda_head::where('id', 1)->get();
        $pdf_id = 4;
        $event_name = ['name' => 'DANCE REVOLUTION (Inter-Collegiate Dance Battle)'];
        $year = now('Asia/Manila')->year;
        $user = User::where('id', auth()->id())->get();

        $registeruser = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 6)
        ->get();
        // dd($registeruser);
        $event_user_status = Tbl_event_registration::where('user_id', auth()->id())
        ->where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 6)
        ->where('event_registration_status', 2)
        ->value('event_registration_status');
        
        $pdf = PDF::loadView('/pdf_output', compact('user','dataImage', 'event_name', 'ydahead', 'pdf_id', 'event_user_status', 'registeruser'));
        $pdf->setPaper('legal', 'portrait', 'arial');
        return $pdf->stream('dance_revolution.pdf');
    }
    

    
    
}
