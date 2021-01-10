<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_outside_event extends Model
{
    protected $guarded = [];
    
    public function tbl_event()
    {
    	return $this->belongsTo(Tbl_event::class);
    }
}
