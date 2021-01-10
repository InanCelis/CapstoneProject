<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_event_registration extends Model
{
    protected $guarded = [];
    
	public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tbl_event()
    {
    	return $this->belongsTo(Tbl_event::class);
    }

    public function tbl_event_member()
    {
    	return $this->hasMany(Tbl_event_member::class);
    }


}
