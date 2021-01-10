<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use App\Tbl_post;
use Pusher\Pusher;
use App\Helpers\NotificationHelper;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($username)
    {	
        $notifications = NotificationHelper::notification();
    	$usernames = User::where('username', $username)->get();

        if(count($usernames) <= 0)
        { 
            abort(404);
        }
        else 
        {
        	$userid = User::where('username', $username)->value('id');

        	$post = Tbl_post::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->where('user_id', $userid)
            ->get()
            ->map(function ($row){
              $row->post_description = preg_replace('/#\w+/i', "<b>$0</b>", $row->post_description);

              $row->post_description = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', "<a class='link_description' target='_blank' href='$0'>$0</a>", $row->post_description);
              
              return $row;
            });

            $countimages = Tbl_post::join('tbl_post_images', 'tbl_posts.id', '=', 'tbl_post_images.tbl_post_id')
            ->where('tbl_posts.status', '=', 1)
            ->where('tbl_posts.user_id', '=', $userid)
            ->orderBy('tbl_posts.updated_at','desc')
            ->get();

           

            $countvideos = Tbl_post::join('tbl_post_videos', 'tbl_posts.id', '=', 'tbl_post_videos.tbl_post_id')
            ->where('tbl_posts.status', '=', 1)
            ->where('tbl_posts.user_id', '=', $userid)
            ->orderBy('tbl_posts.updated_at','desc')
            ->get();

            // dd($post->count());
         foreach($usernames as $user)
         {


        	if($userid == auth()->id())
        	{
        	 return view('userpage.myprofile', compact('post', 'usernames', 'userid','countimages', 'countvideos','notifications'))->with('pagename', $user->first_name.' '.$user->last_name);
            }
            else
            {
        	 return view('userpage.myprofile', compact('post', 'usernames', 'userid','countimages', 'countvideos','notifications'))->with('pagename', $user->first_name.' '.$user->last_name);

            }
        }

        }
    }

    public function removeprofile($id /* auth id**/)
    {   
        if($id == auth()->id())
        {
          User::where('id', auth()->id())->update(['profile_picture' => 'none']);
         return response()->json(['success' => $id]);
        }
        else
        {
          return response()->json(['sorry' => "Can't remove profile"]);  
        }
    }
    
    public function changecolorcode($id, $colorcode)
    { 
        if($id == auth()->id())
        {
          User::where('id', auth()->id())->update(['color_profile' => $colorcode]);
          return response()->json(['success' => $id]);
        }
        else
        {
          return response()->json(['sorry' => "Can't change profile color"]);  
        }
        
    }
    public function updateprofilepicture(Request $request, $id)
    {
        if($id == auth()->id())
        {
            $file = $request->all();

            if ($request->has('profile_image')) 
            {
               $rules = array(
                'profile_image'   =>  'image',
                 );

                $error = Validator::make($file, $rules);
                if($error->fails())
                {
                  return response()->json(['errors' => $error->errors()->all()]);
                }

            $image = $request->file('profile_image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_picture'), $new_name);
            
            $form_data = array(
                
                'profile_picture' =>  $new_name
            );

            User::where('id', auth()->id())->update($form_data);
             }
          return response()->json(['success' => "sd"]);
        }
        else
        {
          return response()->json(['sorry' => "Can't change profile picture"]);  
        }
    }
}
