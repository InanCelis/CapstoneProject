<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_event_member extends Model
{
	protected $guarded = [];
	
    public function tbl_event_registration()
    {
    	return $this->belongsTo(Tbl_event_registration::class);
    }
}
