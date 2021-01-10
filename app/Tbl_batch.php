<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_batch extends Model
{
    protected $guarded = [];

    public function tbl_tesda_registration()
    {
        return $this->hasMany(Tbl_tesda_registration::class);
   
    }

}
