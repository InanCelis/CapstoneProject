<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_announcement;
use Validator;
use Carbon\Carbon;
use Auth;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;
use App\Tbl_audit_trail;

class AnnouncementController extends Controller
{
    public function index()
    {   


        $notifications = NotificationHelper::notification();

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

        $announcement = Tbl_announcement::orderBy('updated_at', 'desc')
        ->where('status', 1)
        ->paginate(6)
        ->map(function ($row){
          $row->description = preg_replace('/#\w+/i', "<strong class='text-dark'>$0</strong>", $row->description);

          return $row;
        });
          
        return view('/announcement', compact('announcement','notifications','fb_share_link'))->with('pagename', 'Announcement');
    }
    

    public function fetch_announcement(Request $request)
    {
        if ($request->ajax()) {

            $notifications = NotificationHelper::notification();
            $announcement = Tbl_announcement::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->paginate(6)
            ->map(function ($row){
              $row->description = preg_replace('/#\w+/i', "<strong class='text-dark'>$0</strong>", $row->description);

              return $row;
            });

           return view('userpage.includes.announcement', compact('announcement','notifications'))->with('pagename', 'Announcement')->render();
        }
        else {
            abort(404);
        }
    }

    public function viewannouncement($url)
    {
        $notifications = NotificationHelper::notification();
        $currenturl = Tbl_announcement::where('url',$url)
         ->paginate(1)
         ->map(function ($row){
          $row->description = preg_replace('/#\w+/i', "<strong class='text-dark'>$0</strong>", $row->description);

          $row->description = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', "<a class='link_description' target='_blank' href='$0'>$0</a>", $row->description);

          return $row; 
        });

        if(count($currenturl))
        {
            $announcement = Tbl_announcement::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->where('url','!=', $url)
            ->paginate(7)
            ->map(function ($row){
              $row->description = preg_replace('/#\w+/i', "<strong class='text-dark'>$0</strong>", $row->description);

              return $row;
            });


            foreach($currenturl as $curURL){
                $fb_share_link = [
                    "title" => $curURL->title,
                    "description" => substr($curURL->description, 0, 100),
                    "url" => 'announcement/view/'.$curURL->url,
                    "published_time" => $curURL->created_at,
                    "modified_time" => $curURL->updated_at,
                    "updated_time" => $curURL->updated_at,
                    "image" => $curURL->picture,
                    "secure_url" => 'announcement/view/'.$curURL->url,
                ];
            }

            if($curURL->status == 1)
            {
                return view('/view-announcement', compact('currenturl', 'announcement','notifications','fb_share_link'))->with('pagename', $curURL->title);
            }
            else if(!Auth::user())
            {
                abort(404);
            }
            else if(auth()->user()->usertype == 1)
            {
                return view('/view-announcement', compact('currenturl', 'announcement','notifications','fb_share_link'))->with('pagename', $curURL->title);
            }
            
            else
            {
                abort(404);
            }
            
        }
        else
        {
            abort(404);
        }
        
    }


    public function creatannouncement()
    {
        if(auth()->user()->usertype == 1)
        {  
            $notifications = NotificationHelper::notification();
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
            return view('/create-announcement',compact('notifications','fb_share_link'))->with('pagename', 'Create Announcement');
        }
        else
        {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if(auth()->user()->usertype == 1)
        {
        

            $this->validate($request,
            [
                'title'         => 'required|max:50|unique:tbl_announcements',
                'picture'       => 'required',
                'description'   => 'required',
            ]);

            $image = $request->file('picture');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('announcement_images'), $new_name);

            $url = str_replace(' ', '-', strtolower($request->title));

            $form_data = array(
                'url'            => $url,
                'title'          => $request->title,
                'description'    => $request->description,
                'picture'        => $new_name,
            );

            Tbl_audit_trail::create([
                'user_id'        => auth()->id(),
                'action_message' => 'Created an Announcement ('.$request->title.')',
            ]);

            $text = ['announcement' => $url];
            event(new NotificationEvent($text));
            Tbl_announcement::create($form_data);
            return redirect('/announcement')->with('success', 'Created an announcement');

        }
        else
        {
            abort(403);
        }
    }
    
    public function edit_announcement($id)
    {
        
        if(auth()->user()->usertype == 1)
        {  
            $notifications = NotificationHelper::notification();
            $announcement = Tbl_announcement::where('id', $id)->get();
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
            if(count($announcement))
            {
                return view('/edit-announcement', compact('announcement','notifications','fb_share_link'))->with('pagename', 'Edit Announcement');
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }

    }
    public function update_announcement(request $request, $id)
    {
        if(auth()->user()->usertype == 1)
        {
        

            $this->validate($request,
            [
                'title'         => 'required|max:50|unique:tbl_announcements,id',
                'description'   => 'required',
            ]);

            if($request->has('picture'))
            {
                $image = $request->file('picture');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('announcement_images'), $new_name);

                $url = str_replace(' ', '-', strtolower($request->title));

                $form_data = array(
                    'url'            => $url,
                    'title'          => $request->title,
                    'description'    => $request->description,
                    'picture'        => $new_name,
                );
            }
            else
            {
                $url = str_replace(' ', '-', strtolower($request->title));

                $form_data = array(
                    'url'            => $url,
                    'title'          => $request->title,
                    'description'    => $request->description,
                );
            }

            Tbl_announcement::where('id', $id)->update($form_data);

            Tbl_audit_trail::create([
                'user_id'        => auth()->id(),
                'action_message' => 'Updated an Announcement ('.$request->title.')',
            ]);

            $text = ['announcement' => $url];
            event(new NotificationEvent($text));
            return redirect('/announcement')->with('success', 'Updated an announcement');

        }
        else
        {
            abort(403);
        }
    }

    public function movetoarchive(Request $request, $id)
    {
        if ($request->ajax())
        {
            $check = Tbl_announcement::where('id', $id)->get();

            if(count($check))
            {
                if(auth()->user()->usertype == 1)
                {
                    Tbl_announcement::where('id', $id)->update(['status' => 0]);

                    foreach ($check as $anncmnt) {
                       Tbl_audit_trail::create([
                            'user_id'        => auth()->id(),
                            'action_message' => 'Archive an Announcement ('.$anncmnt->title.')',
                        ]);
                    }
                    return response()->json(['success' => 'Moved to Archive.']);
                }
                else
                {
                    return response()->json(['error' => 'Access Denied']);
                }
            }
            else
            {
                return response()->json(['error' => 'Access Denied']);
            }
            
            
        } 
        else
        {
            abort(403);
        }
    }
 
    public function restore(Request $request, $id)
    {
        if ($request->ajax())
        {
            $check = Tbl_announcement::where('id', $id)->get();

            if(count($check))
            {
                if(auth()->user()->usertype == 1)
                {
                    Tbl_announcement::where('id', $id)->update(['status' => 1]);

                    foreach ($check as $anncmnt) {
                       Tbl_audit_trail::create([
                            'user_id'        => auth()->id(),
                            'action_message' => 'Restored an Announcement ('.$anncmnt->title.')',
                        ]);
                    }

                    return response()->json(['success' => 'Restored.']);
                }
                else
                {
                    return response()->json(['error' => 'Access Denied']);
                }
            }
            else
            {
                return response()->json(['error' => 'Access Denied']);
            }
            
            
        }
        else
        {
            abort(403);
        }
    }

    public function announcement_archive()
    {   
        $notifications = NotificationHelper::notification();
        $announcement = Tbl_announcement::orderBy('updated_at', 'desc')
        ->where('status', 0)
        ->paginate(6)
        ->map(function ($row){
          $row->description = preg_replace('/#\w+/i', "<strong class='text-dark'>$0</strong>", $row->description);

          return $row;
        });

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
          
        return view('/announcement-archive', compact('announcement','notifications','fb_share_link'))->with('pagename', 'Announcement');
    }
    public function fetch_arvhive(Request $request)
    {   
        if ($request->ajax()) {

            $notifications = NotificationHelper::notification();
            $announcement = Tbl_announcement::orderBy('updated_at', 'desc')
            ->where('status', 0)
            ->paginate(6)
            ->map(function ($row){
              $row->description = preg_replace('/#\w+/i', "<strong class='text-dark'>$0</strong>", $row->description);

              return $row;
            });

           return view('userpage.includes.announcement', compact('announcement','notifications'))->with('pagename', 'Announcement')->render();
        }
        else {
            abort(404);
        }
    }
    
    
}
