<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_post_video extends Model
{
	protected $guarded = [];
	
    public function tbl_post()
    {
    	return $this->belongsTo(Tbl_post::class);
    }
}
