<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Tbl_address;
use App\Tbl_barangay;
use App\Tbl_post;
use App\Tbl_post_comment;
use App\Tbl_post_heart;
use App\Tbl_post_image;
use App\Tbl_post_video;
use App\Tbl_announcement;
use Validator;
use Auth;
use App\Tbl_notification;
use Dirape\Token\Token;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    { 
        $notifications = NotificationHelper::notification();

        $post = Tbl_post::orderBy('updated_at', 'desc')
        ->where('status', 1)
        ->paginate(6)
        ->map(function ($row){
          $row->post_description = preg_replace('/#\w+/i', "<b>$0</b>", $row->post_description);

          $row->post_description = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', "<a class='link_description' target='_blank' href='$0'>$0</a>", $row->post_description);
          return $row;
        });

        $announcement = Tbl_announcement::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->paginate(5)
            ->map(function ($row){
              $row->description = preg_replace('/#\w+/i', "<strong class='text-dark'>$0</strong>", $row->description);

              return $row;
            });
          

        return view('userpage.home', compact('post','announcement', 'notifications'))->with('pagename', 'Newsfeed');

    }

    public function viewpost($username, $post_url)
    {
       
       $checkpost = Tbl_post::where('post_url', $post_url)
       ->where('status', 1)
       ->get();

       if(count($checkpost))
       {
           

           foreach($checkpost as $postview)
           {
            Tbl_notification::where('to_id', auth()->id())
            ->where('tbl_post_id', $postview->id)
            ->update(['unread' => 0]);
           }

           $notifications = NotificationHelper::notification();

            $post = Tbl_post::where('post_url', $post_url)
            ->where('status', 1)
            ->paginate(6)
            ->map(function ($row){
              $row->post_description = preg_replace('/#\w+/i', "<b>$0</b>", $row->post_description);

              $row->post_description = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', "<a class='link_description' target='_blank' href='$0'>$0</a>", $row->post_description);
              return $row;
            });

            $announcement = Tbl_announcement::orderBy('updated_at', 'desc')
                ->where('status', 1)
                ->paginate(5)
                ->map(function ($row){
                  $row->description = preg_replace('/#\w+/i', "<strong class='text-dark'>$0</strong>", $row->description);

                  return $row;
                });
              

            return view('userpage.view_post', compact('post','announcement', 'notifications'))->with('pagename', 'Post');
        }
        else
        {
            abort(404);
        }
    }

    

    public function fetch_post(Request $request)
    { 
        if ($request->ajax()) {

            $post = Tbl_post::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->paginate(6)
            ->map(function ($row){
              $row->post_description = preg_replace('/#\w+/i', "<b>$0</b>", $row->post_description);

              $row->post_description = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', "<a class='link_description' target='_blank' href='$0'>$0</a>", $row->post_description);
              return $row;
            });

        return view('userpage.includes.feeds', compact('post'))->with('pagename', 'Newsfeed')->render();
        }
        else {
            abort(404);
        }

    }

    public function showlatest(Request $request)
    {
        if ($request->ajax()) {
           $post = Tbl_post::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->paginate(6)
            ->map(function ($row){
              $row->post_description = preg_replace('/#\w+/i', "<b>$0</b>", $row->post_description);

              $row->post_description = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', "<a class='link_description' target='_blank' href='$0'>$0</a>", $row->post_description);
              return $row;
            });

            return view('userpage.includes.feeds', compact('post'))->with('pagename', 'Newsfeed')->render();
        }
        else {
            abort(404);
        }
    }

    public function showheartmost(Request $request)
    {
        if ($request->ajax()) {

            $post_id = DB::select('SELECT tbl_post_id FROM tbl_post_hearts  GROUP BY tbl_post_id HAVING COUNT(tbl_post_id) ORDER BY COUNT(tbl_post_id) ASC LIMIT 15');

            $asd = array();
            foreach ($post_id as $id) {
                array_push($asd, $id->tbl_post_id);
                
            }


            $post = Tbl_post::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->where(function($p) use ($asd){
                foreach ($asd as $value) {
                    $p->orWhere('id', $value);
                }
            })
            ->paginate(20)
            ->map(function ($row){
              $row->post_description = preg_replace('/#\w+/i', "<b>$0</b>", $row->post_description);

              $row->post_description = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', "<a class='link_description' target='_blank' href='$0'>$0</a>", $row->post_description);
              return $row;
            });
            return view('userpage.includes.feeds', compact('post'))->with('pagename', 'Newsfeed')->render();
           
        }
        else {
            abort(404);
        }

    }

    public function showcommentsmost(Request $request)
    {
        if ($request->ajax()) {

            $post_id = DB::select('SELECT tbl_post_id FROM tbl_post_comments WHERE status = 1 GROUP BY tbl_post_id HAVING COUNT(tbl_post_id) ORDER BY COUNT(tbl_post_id) DESC LIMIT 15');

            $asd = array();
            foreach ($post_id as $id) {
                array_push($asd, $id->tbl_post_id);
                
            }
            

    

            $post = Tbl_post::orderBy('updated_at', 'desc')
            ->where('status', 1)
            ->where(function($p) use ($asd){
                foreach ($asd as $value) {
                    $p->orWhere('id', $value);
                }
            })
            ->paginate(20)
            ->map(function ($row){
              $row->post_description = preg_replace('/#\w+/i', "<b>$0</b>", $row->post_description);

              $row->post_description = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', "<a class='link_description' target='_blank' href='$0'>$0</a>", $row->post_description);
              return $row;
            });
            return view('userpage.includes.feeds', compact('post'))->with('pagename', 'Newsfeed')->render();
           
           
        }
        else {
            abort(404);
        }
    }
    public function search(Request $request)
    {
        $notifications = NotificationHelper::notification();

        $s = $request->q;

        $users = User::where(function ($q) use ($s) {
            $q -> where('first_name', 'LIKE', '%' . $s . '%')->
                  orWhere('middle_name', 'LIKE', '%' . $s . '%')->
                  orWhere('last_name', 'LIKE', '%' . $s . '%');
        })->
        orderBy('created_at', 'desc')->
        paginate(10);

        $post = Tbl_post::where(function ($q) use ($s) {
            $q -> where('post_description', 'LIKE', '%' . $s . '%')->
                  where('status', 1);
        })->
        orderBy('created_at', 'desc')->
        paginate(10);

        return view('userpage.search', compact('users', 'post','notifications'))->with('pagename', 'Search');
    }

   public function store(Request $request)
    {
        $file = $request->all();
        $token = new Token();
        $token = str_random(35);
        
        if ($request->has('image')) 
        {
            $rules = array(

            'image.*'   =>  'image',
             );

            $error = Validator::make($file, $rules);
            if($error->fails())
            {
              return response()->json(['errors' => $error->errors()->all()]);
            }

           if ($request->description)
           {
                 if (count($file['image']) > 10) 
                 {
                    return response()->json(['sorry' => 'Maximum of 10 image only!']);
                 }
                 else
                 {  
                   
                    Tbl_post::create(['post_url' => $token,'post_description'=> $request->description, 'user_id' => auth()->id()]);
                    $post_id = Tbl_post::orderBy('id', 'desc')->limit(1)->value('id'); 

                    for ($i=0; $i < count($file['image']); $i++) 
                    { 

                        $image = $file['image'][$i];
                        $new_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('post_images'), $new_name);

                        $addimages = [
                            'post_image'   => $new_name,
                            'tbl_post_id'  => $post_id,
                        ];

                        Tbl_post_image::create($addimages);
                    }
                   

                    return response()->json(['success' => $post_id]);
                 }
           } 
           else
           {
                if (count($file['image']) >= 10) 
                {
                    return response()->json(['sorry' => 'Maximum of 10 image only!']);
                }
                else
                 {  

                    Tbl_post::create(['post_url' => $token, 'user_id' => auth()->id()]);
                    $post_id = Tbl_post::orderBy('id', 'desc')->limit(1)->value('id'); 

                    for ($i=0; $i < count($file['image']); $i++) 
                    { 

                        $image = $file['image'][$i];
                        $new_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('post_images'), $new_name);

                        $addimages = [
                            'post_image'   => $new_name,
                            'tbl_post_id'  => $post_id,
                        ];

                        Tbl_post_image::create($addimages);
                    }
                    return response()->json(['success' => $post_id]);
                 }
           }

        }
        else if ($request->has('video')) 
        {

            $rules = array(
              'video'  =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts'
             );
             
            $error = Validator::make($file, $rules);
            if($error->fails())
            {
              return response()->json(['errors' => $error->errors()->all()]);
            }

            if ($request->description) 
            {
                Tbl_post::create(['post_url' => $token, 'post_description'=> $request->description, 'user_id' => auth()->id()]);
                $post_id = Tbl_post::orderBy('id', 'desc')->limit(1)->value('id'); 


                $video = $file['video'];
                $new_name = rand() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('post_videos'), $new_name);

                $addvideos = [
                        'post_videos'   => $new_name,
                        'tbl_post_id'  => $post_id,
                ];
                Tbl_post_video::create($addvideos);
                return response()->json(['success' => 'may video tapos may description']);
            } 
            else
            {
                Tbl_post::create(['post_url' => $token, 'user_id' => auth()->id()]);
                $post_id = Tbl_post::orderBy('id', 'desc')->limit(1)->value('id'); 


                $video = $file['video'];
                $new_name = rand() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('post_videos'), $new_name);

                $addvideos = [
                        'post_videos'   => $new_name,
                        'tbl_post_id'  => $post_id,
                ];
                Tbl_post_video::create($addvideos);
                return response()->json(['success' => 'may video walang description']);

            }

        }
        else if ($request->description) 
        {

            Tbl_post::create(['post_url' => $token, 'post_description'=> $request->description, 'user_id' => auth()->id()]);
            
            return response()->json(['success' => 'may description walang kahit ano']);

        }
        else
        {
         return response()->json(['sorry' => 'Invalid post']);

        }

     

    }

    public function destroy(Request $request, $id)
    {
        //delete post
        
        $postid = Tbl_post::where(['user_id' => auth()->id(), 'id' => $id])->get();  

        if(count($postid) > 0 || auth()->user()->usertype == 1)
        {
            // Tbl_post_image::where('tbl_post_id', $id)->delete();
            // Tbl_post_video::where('tbl_post_id', $id)->delete();
            // Tbl_post_heart::where('tbl_post_id', $id)->delete();
            // Tbl_post_comment::where('tbl_post_id', $id)->delete();
            Tbl_post::where('id', $id)->update(['status' => 0]);
            return response()->json(['success' => 'successfully']);
        }

        else
        {
            return response()->json(['sorry' => 'This post is not yours!']);
        }
       
        

    }

    public function heart(Request $request, $id)
    {
        $verify_user_id = Tbl_post_heart::where('user_id' ,auth()->id())->where('tbl_post_id',$id)->get();

        if(count($verify_user_id) == 0)
        {
            Tbl_post_heart::create(['user_id' => auth()->id(), 'tbl_post_id' => $id ]);

            $countheart = Tbl_post_heart::where('tbl_post_id', $id)->get();
            $count = count($countheart);

            $to_id = Tbl_post::where('id', $id)
            ->where('status', 1)
            ->value('user_id');

            if($to_id != auth()->id())
            {
                Tbl_notification::create([
                    'message'       => 'Hearts your post',
                    'notif_type'    => 1,
                    'to_id'         => $to_id,
                    'user_id'       => auth()->id(),
                    'tbl_post_id'   => $id
                ]); 

                $text = [
                    'hearts' => $to_id,
                    'from'   => auth()->user()->first_name. ' '.auth()->user()->last_name,
                ];

                event(new NotificationEvent($text));
            }
            

            return response()->json(['success' => 'successfully', 'allheart' => $count]);
        }

        //count all heart in post
        
        
    }

    public function unheart(Request $request, $id)
    {
        $verify_user_id = Tbl_post_heart::where('user_id' ,auth()->id())->where('tbl_post_id',$id)->get();
        if(count($verify_user_id) > 0)
        {
            Tbl_post_heart::where('user_id' ,auth()->id())->where('tbl_post_id', $id)->delete();

            $countheart = Tbl_post_heart::where('tbl_post_id', $id)->get();
            $count = count($countheart);
            
            $to_id = Tbl_post::where('id', $id)
            ->where('status', 1)
            ->value('user_id');

            if($to_id != auth()->id())
            {
                Tbl_notification::where('to_id', $to_id)
                ->where('user_id', auth()->id())
                ->where('notif_type', 1)
                ->where('tbl_post_id', $id)
                ->delete();

                $text = ['unhearts' => $to_id];
                event(new NotificationEvent($text));
            }

            return response()->json(['success' => 'successfully', 'allheart' => $count]);
        }
    }

 
    public function getHeartandMessage($id)
    {
        $heartdata = Tbl_post_heart::where('tbl_post_id', $id)->orderBy('updated_at', 'desc')->get();
        $commentdata = Tbl_post_comment::where('tbl_post_id', $id)->where('status', 1)->
        orderBy('updated_at', 'desc')->get();
        $post_id = $id;

        return view('userpage.modals.hearts_and_comment', compact('heartdata', 'commentdata', 'post_id'));
    }



    public function sendMessage(Request $request, $id)
    {   
      if($request->comment_content != '')
      {
        $checkpoststatus = Tbl_post::where('id', $id)
        ->where('status', 1)
        ->get();

        if(count($checkpoststatus))
        {
            $user_comment = User::where('id', auth()->id())
                            ->select(
                                'id',
                                'first_name',
                                'last_name'
                            )
                            ->get();

            foreach ($user_comment as  $value) {
                $from_id = auth()->id();
                $from_fullname = $value->first_name." ".$value->last_name;
            }

            $user = Tbl_post::where('id', $id)
                                ->select(
                                    'user_id'
                                )
                                ->get();

            foreach ($user as  $value) {
                $to_id = $value->user_id;
            }

            if ($to_id != auth()->id()) {
                Tbl_notification::create([
                    'message'       => 'Commented on your post',
                    'notif_type'    => 2,
                    'to_id'         => $to_id,
                    'user_id'       => auth()->id(),
                    'tbl_post_id'   => $id
                ]); 
            }

            $text = [
                'code' => "comment",
                'comment_message' => 'commented on your post: "'.str_limit($request->comment_content, 20).'"',
                'to_id' => $to_id,
                'from_id' => $from_id,
                'from_fullname' => $from_fullname
            ];


            event(new NotificationEvent($text));



            $all_comment_user = Tbl_post_comment::where('tbl_post_id', $id)
                                ->where('status', 1)
                                ->where('user_id', '!=', auth()->id())
                                ->where('user_id', '!=', $to_id)
                                ->groupBy('user_id')
                                ->get();

           

            foreach ($all_comment_user as $value) {

                Tbl_notification::create([
                        'message'       => 'also commented: "'.str_limit($request->comment_content, 20).'"',
                        'notif_type'    => 2,
                        'to_id'         => $value->user_id,
                        'user_id'       => auth()->id(),
                        'tbl_post_id'   => $id
                    ]); 


                $text2 = [
                    'code' => "also_commented",
                    'comment_message' => 'also commented: "'.str_limit($request->comment_content, 20).'"',
                    'to_id' => $value->user_id,
                    'from_id' => auth()->id(),
                    'from_fullname' => auth()->user()->first_name." ".auth()->user()->last_name
                ];

                event(new NotificationEvent($text2));

            }


            
                
                Tbl_post_comment::create(['post_comment'=> $request->comment_content, 'user_id' => auth()->id(), 'tbl_post_id' => $id]);
                $commentdata = Tbl_post_comment::where('tbl_post_id', $id)->where('status', 1)->get();
                $count = count($commentdata);



                return response()->json(['success' => 'Successfully', 'allcomment' => $count, 'commentdata' => $commentdata]);
        }
        else
        {
            return response()->json(['sorry' => 'Post is deleted']);
        }
            
      }
      else
      {
            return response()->json(['errors' => 'No message']);
      }
        
    }



    public function deleteMessage(Request $request, $id, $post_id)
    {
        //update message status
        
       

            $thisIsAuthPost = Tbl_post::where('id', $post_id)->where('user_id', auth()->id())->get();

            $thisIsAuthComment = Tbl_post_comment::where('id', $id)->where('user_id', auth()->id())->where('tbl_post_id', $post_id)->get();

           if(count($thisIsAuthPost) > 0)
           {
            
                Tbl_post_comment::where('id',$id)->where('tbl_post_id', $post_id)->update(['status'=> 2]);

                $commentdata = Tbl_post_comment::where('tbl_post_id', $post_id)->where('status', 1)->get();
                $count = count($commentdata);
                return response()->json(['success' => 'Successfully', 'allcomment' => $count, 'commentdata' => $commentdata]);
           }
           else if(count($thisIsAuthComment) > 0)
           {
                Tbl_post_comment::where('id',$id)->where('tbl_post_id', $post_id)->update(['status'=> 2]);
                $commentdata = Tbl_post_comment::where('tbl_post_id', $post_id)->where('status', 1)->get();
                $count = count($commentdata);
                return response()->json(['success' => 'Successfully', 'allcomment' => $count, 'commentdata' => $commentdata]);
           }
           else
           {
            return response()->json(['sorry' => "Can't Remove"]);
           }
    }

    public function getPost($id /* post_id**/)
    {
        $postdata = Tbl_post::where('id', $id)->where('user_id', auth()->id())->where('status', 1)->get();
        $post_id = $id;
        if(count($postdata) > 0)
        {
          $sorry ='';
          return view('userpage.modals.edit_post', compact('postdata', 'post_id','sorry'));

        }
        else
        {
           $sorry ="You can't edit this post!";
           return view('userpage.modals.edit_post', compact('post_id', 'sorry'));
        }
    }
    public function updatePost(Request $request, $id /* post_id**/)
    {
        $post = Tbl_post::where('id', $id)->where('user_id', auth()->id())->get();
        $file = $request->all();
        if(count($post) > 0)
        {

           if ($request->has('image')) 
            {
                $rules = array(

                'image.*'   =>  'image|max:1000240',
                 );

                $error = Validator::make($file, $rules);
                if($error->fails())
                {
                  return response()->json(['errors' => $error->errors()->all()]);
                }

               if ($request->edit_description) 
               {
                     if (count($file['image']) > 10) 
                     {
                        return response()->json(['sorry' => 'Maximum of 10 image only!']);
                     }
                     else
                     {  
                        Tbl_post_image::where('tbl_post_id', $id)->delete();
                        Tbl_post_video::where('tbl_post_id', $id)->delete();

                        $data = [
                            'post_description' => $request->edit_description,
                        ];
                        Tbl_post::where('id', $id)->where('user_id', auth()->id())->where('status', 1)->update($data);

                        for ($i=0; $i < count($file['image']); $i++) 
                        { 

                            $image = $file['image'][$i];
                            $new_name = rand() . '.' . $image->getClientOriginalExtension();
                            $image->move(public_path('post_images'), $new_name);

                            $addimages = [
                                'post_image'   => $new_name,
                                'tbl_post_id'  => $id,
                            ];

                            Tbl_post_image::create($addimages);
                        }
                        return response()->json(['success' => $id]);
                     }
               } 
               else
               {
                    if (count($file['image']) >= 10) 
                    {
                        return response()->json(['sorry' => 'Maximum of 10 image only!']);
                    }
                    else
                     {  
                        Tbl_post_image::where('tbl_post_id', $id)->delete();
                        Tbl_post_video::where('tbl_post_id', $id)->delete();

                        $data = [
                            'post_description' => $request->edit_description,
                        ];
                        Tbl_post::where('id', $id)->where('user_id', auth()->id())->where('status', 1)->update($data);

                        for ($i=0; $i < count($file['image']); $i++) 
                        { 

                            $image = $file['image'][$i];
                            $new_name = rand() . '.' . $image->getClientOriginalExtension();
                            $image->move(public_path('post_images'), $new_name);

                            $addimages = [
                                'post_image'   => $new_name,
                                'tbl_post_id'  => $id,
                            ];

                            Tbl_post_image::create($addimages);
                        }
                        return response()->json(['success' => $id]);
                     }
               }

            }
            else if ($request->has('video')) 
            {

                $rules = array(
                  'video'  =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:1000400'
                 );
                 
                $error = Validator::make($file, $rules);
                if($error->fails())
                {
                  return response()->json(['errors' => $error->errors()->all()]);
                }

                if ($request->edit_description) 
                {
                    Tbl_post_image::where('tbl_post_id', $id)->delete();
                    Tbl_post_video::where('tbl_post_id', $id)->delete();

                    $data = [
                            'post_description' => $request->edit_description,
                        ];
                    Tbl_post::where('id', $id)->where('user_id', auth()->id())->where('status', 1)->update($data); 


                    $video = $file['video'];
                    $new_name = rand() . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('post_videos'), $new_name);

                    $addvideos = [
                            'post_videos'   => $new_name,
                            'tbl_post_id'  => $id,
                    ];
                    Tbl_post_video::create($addvideos);
                    return response()->json(['success' => 'may video tapos may description']);
                } 
                else
                {
                    Tbl_post_image::where('tbl_post_id', $id)->delete();
                    Tbl_post_video::where('tbl_post_id', $id)->delete();

                    $data = [
                            'post_description' => $request->edit_description,
                        ];
                    Tbl_post::where('id', $id)->where('user_id', auth()->id())->where('status', 1)->update($data);  


                    $video = $file['video'];
                    $new_name = rand() . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('post_videos'), $new_name);

                    $addvideos = [
                            'post_videos'   => $new_name,
                            'tbl_post_id'  => $id,
                    ];
                    Tbl_post_video::create($addvideos);
                    return response()->json(['success' => 'may video walang description']);

                }

            }
            else if ($request->edit_description) 
            {

                $data = [
                            'post_description' => $request->edit_description,
                        ];
                Tbl_post::where('id', $id)->where('user_id', auth()->id())->where('status', 1)->update($data);  

                return response()->json(['success' => 'may description wala lahat']);
            }
            else
            {
             return response()->json(['sorry' => 'Invalid post']);

            }
         
        }
        else
        {
          return response()->json(['sorry' => 'This post is not yours!']);
        }
        
    }


    public function getComment($id /* comment_id**/)
    {
        $comment_data = Tbl_post_comment::where('id', $id)->where('user_id', auth()->id())->get();
        $comment_id = $id;

        if(count($comment_data) > 0)
        {
           $sorry ='';
           return view('userpage.modals.edit_post_comment', compact('comment_data','comment_id', 'sorry'));

        }
        else
        {
           $sorry = "You can't edit this comment!";
           return view('userpage.modals.edit_post_comment', compact('sorry', 'comment_id')); 
        }
    }

    public function update_comment(Request $request, $id /*comment_id**/)
    {
        $comment_data = Tbl_post_comment::where('id', $id)->where('user_id', auth()->id())->where('status', 1)->get();

        if(count($comment_data) > 0)
        {
            $rules = array(
                'edit_comment_content' =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

           $data = [
            'post_comment' => $request->edit_comment_content,
            ];
           Tbl_post_comment::where('id', $id)->where('user_id', auth()->id())->where('status', 1)->update($data); 
           return response()->json(['success' => 'Success!']);

        }
        else
        {
           return response()->json(['sorry' => 'This comment is not yours!']);
        }
    }

    public function resetnotifcount(Request $request)
    {
        if($request->ajax())
        {
            Tbl_notification::where('to_id', auth()->id())->update(['status' => 0]);
            return response()->json(['success' => '']);
        }
        else
        {
            abort(404);
        }
    }

    public function markallread(Request $request)
    {
       if($request->ajax())
        {
            Tbl_notification::where('to_id', auth()->id())->update(['unread' => 0]);
            return response()->json(['success' => '']);
        }
        else
        {
            abort(404);
        }
    }

}
