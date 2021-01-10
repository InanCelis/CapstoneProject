<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_barangay extends Model
{
    protected $guarded = [];

    public function tbl_address()
    {
    	return $this->hasMany(Tbl_address::class);
    }

    public function tbl_town($value='')
    {
    	return $this->belongsTo(Tbl_town::class);
    }

}
