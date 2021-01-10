<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Tbl_post extends Model
{
    protected $guarded = [];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tbl_post_comment()
    {
        return $this->hasMany(Tbl_post_comment::class);
   
    }

    public function tbl_post_heart()
    {
        return $this->hasMany(Tbl_post_heart::class);
   
    }

    public function tbl_post_image()
    {
        return $this->hasMany(Tbl_post_image::class);
   
    }

    public function tbl_post_video()
    {
        return $this->hasMany(Tbl_post_video::class);
   
    }
    public function tbl_notification()
    {
        return $this->hasOne(Tbl_notification::class);
    }

    public function isAuthUserLikedPost(){
      $like = $this->tbl_post_heart()->where('user_id',  Auth::user()->id)->get();
      if ($like->isEmpty()){
          return false;
      }
      return true;
   }
}
