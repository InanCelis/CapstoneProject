<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_accreditation_request extends Model
{
	protected $guarded = [];
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
