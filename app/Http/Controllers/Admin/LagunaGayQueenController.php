<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tbl_fetchyear;
use App\Tbl_event_registration;
use App\Helpers\NotificationHelper;

class LagunaGayQueenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //status of event
        // event_1 - pending
        // event_2- for screening
        // event_3 - pasok na banga
        // event_4 - ligwak
        $notifications = NotificationHelper::notification();
        $year = Tbl_fetchyear::value('year');

        $event = Tbl_event_registration::where('created_at', 'LIKE', ''. $year . '%')
        ->where('tbl_event_id', 7)
        ->orderBy('updated_at', 'desc')
        ->get();
        return view('admin.laguna_gay_queen', compact('year', 'event','notifications'))->with('pagename', 'Laguna Gay Queen');   
    }


}
