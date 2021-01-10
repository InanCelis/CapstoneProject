<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_audit_trail extends Model
{
   protected $guarded = [];

   public function user()
   {
	  return $this->belongsTo(User::class);
   }
}
