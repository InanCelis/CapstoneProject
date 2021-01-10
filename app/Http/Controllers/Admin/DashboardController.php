<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\NotificationHelper;
use App\User;
use App\Tbl_post;
use App\Tbl_event_registration;
use App\Tbl_fetchyear;
use App\Tbl_tesda_registration;
use App\Tbl_accreditation;
use Validator;


class DashboardController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth');
    }
    public function index()
    {

    	$notifications = NotificationHelper::notification();
    	$users = User::where('id', '!=', 1)->get();
    	$posts = Tbl_post::where('status', 1)->get();

        $day = date('Y-m-d');
        $month = date('Y-m');
    	$year = Tbl_fetchyear::where('id', 1)->value('year');

        //daily report
        $dayevent = Tbl_event_registration::where('updated_at', 'LIKE', ''. $day . '%')
        ->get();
        $daytesda = Tbl_tesda_registration::where('updated_at', 'LIKE', ''. $day . '%')
        ->get();
        $dayaccreditation = Tbl_accreditation::where('updated_at', 'LIKE', ''. $day . '%')
        ->get();

        //monthly report
        $monthevent = Tbl_event_registration::where('updated_at', 'LIKE', ''. $month . '%')
        ->get();
        $monthtesda = Tbl_tesda_registration::where('updated_at', 'LIKE', ''. $month . '%')
        ->get();
        $monthaccreditation = Tbl_accreditation::where('updated_at', 'LIKE', ''. $month . '%')
        ->get();


        //anual report
    	$event = Tbl_event_registration::where('updated_at', 'LIKE', ''. $year . '%')
        ->get();
        $tesda = Tbl_tesda_registration::where('updated_at', 'LIKE', ''. $year . '%')
        ->get();
        $accreditation = Tbl_accreditation::where('updated_at', 'LIKE', ''. $year . '%')
        ->get();



    	return view('admin.dashboard', compact('notifications','users','posts','year','event','tesda','accreditation','month','monthevent','monthtesda','monthaccreditation','day','dayevent','daytesda','dayaccreditation'))->with('pagename', 'Dashboard');  
    }

    public function anual(Request $request)
    {

        if ($request->ajax()) {
            $year = $request->year;
            $event = Tbl_event_registration::where('updated_at', 'LIKE', ''. $request->year . '%')
            ->get();

            $tesda = Tbl_tesda_registration::where('updated_at', 'LIKE', ''. $request->year . '%')
            ->get();

            $accreditation = Tbl_accreditation::where('updated_at', 'LIKE', ''. $request->year . '%')
            ->get();

            return response()->json(view('userpage.includes.anual', compact('event','tesda','accreditation','year'))->render());
        }
        else{
            abort(403);
        }
    }

    public function monthly(Request $request)
    {

        if ($request->ajax()) {
            $month = $request->month;
            $monthevent = Tbl_event_registration::where('updated_at', 'LIKE', ''. $request->month . '%')
            ->get();

            $monthtesda = Tbl_tesda_registration::where('updated_at', 'LIKE', ''. $request->month . '%')
            ->get();

            $monthaccreditation = Tbl_accreditation::where('updated_at', 'LIKE', ''. $request->month . '%')
            ->get();

            return response()->json(view('userpage.includes.monthly', compact('monthevent','monthtesda','monthaccreditation','month'))->render());
        }
        else{
            abort(403);
        }
    }

    public function daily(Request $request)
    {

        if ($request->ajax()) {
            $day = $request->day;
            $dayevent = Tbl_event_registration::where('updated_at', 'LIKE', ''. $request->day . '%')
            ->get();

            $daytesda = Tbl_tesda_registration::where('updated_at', 'LIKE', ''. $request->day . '%')
            ->get();

            $dayaccreditation = Tbl_accreditation::where('updated_at', 'LIKE', ''. $request->day . '%')
            ->get();

            return response()->json(view('userpage.includes.daily', compact('dayevent','daytesda','dayaccreditation','day'))->render());
        }
        else{
            abort(403);
        }
    }
    
}
 