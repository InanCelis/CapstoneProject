<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tbl_fetchyear;
use App\Tbl_event_registration;
use Carbon\Carbon;
use App\Helpers\NotificationHelper;

class AnilagSingingIdolKidsController extends Controller
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
        ->where('tbl_event_id', 11)
        ->orderBy('updated_at', 'desc')
        ->get();
       

       
        return view('admin.anilag_singing_idol_kid', compact('year', 'event', 'notifications'))->with('pagename', 'Anilag Singing Idol (Kids Edition)');   
    }
}
