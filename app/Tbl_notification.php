<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_notification extends Model
{
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tbl_post()
    {
    	return $this->belongsTo(Tbl_post::class);
    }
}
