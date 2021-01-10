<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tbl_audit_trail;
use App\Helpers\NotificationHelper;
use App\Tbl_fetchyear;

class AuditTrailController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$notifications = NotificationHelper::notification();

    	$year = Tbl_fetchyear::value('year');
    	$audits =  Tbl_audit_trail::where('created_at', 'LIKE', ''. $year . '%')
    	->where('user_id', '!=', 1)
    	->orderBy('created_at','desc')
    	->get();

    	return view('admin.audit_trail', compact('audits','notifications'))->with('pagename', 'Audit Trails');   
    }
}
