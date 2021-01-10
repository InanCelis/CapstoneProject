<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_town extends Model
{
    protected $guarded = [];

    public function tbl_barangay()
    {
    	return $this->hasMany(Tbl_barangay::class);
    }
}
