<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_accreditation extends Model
{
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tbl_organization_member()
    {
        return $this->hasMany(Tbl_organization_member::class);
   
    }
}
