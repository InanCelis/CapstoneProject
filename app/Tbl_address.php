<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_address extends Model
{
	protected $guarded = [];
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

     public function tbl_barangay()
    {
    	return $this->belongsTo(Tbl_barangay::class);
    }
}
