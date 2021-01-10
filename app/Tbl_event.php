<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_event extends Model
{
	protected $guarded = [];
	
    public function tbl_event_registration()
    {
    	return $this->hasMany(Tbl_event_registration::class);
    }

    public function tbl_outside_event()
    {
        return $this->hasMany(Tbl_outside_event::class);
    }

    public function tbl_sms_history()
    {
    	return $this->hasMany(Tbl_sms_history::class);
    }
}
