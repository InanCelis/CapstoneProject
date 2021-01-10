<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_sms_history extends Model
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
}
