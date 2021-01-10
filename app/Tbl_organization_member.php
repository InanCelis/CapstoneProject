<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_organization_member extends Model
{
    protected $guarded = [];

    public function tbl_accreditation()
    {
    	return $this->belongsTo(tbl_accreditation::class);
    }
}
