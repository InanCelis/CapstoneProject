<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_tesda_registration extends Model
{
	protected $guarded = [];
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tbl_batch()
    {
    	return $this->belongsTo(Tbl_batch::class);
    }
}
