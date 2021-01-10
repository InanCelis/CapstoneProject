<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tbl_address()
    {
        return $this->hasMany(Tbl_address::class);
   
    }

    public function tbl_blocked_user()
    {
        return $this->hasMany(Tbl_blocked_user::class);
   
    }

    public function tbl_event_registration()
    {
        return $this->hasMany(Tbl_event_registration::class);
   
    }

    public function tbl_post()
    {
        return $this->hasMany(Tbl_post::class);
   
    }

    public function tbl_post_comment()
    {
        return $this->hasMany(Tbl_post_comment::class);
   
    }

    public function tbl_post_heart()
    {
        return $this->hasMany(Tbl_post_heart::class);
   
    }

    public function tbl_tesda_registration()
    {
        return $this->hasMany(Tbl_tesda_registration::class);
   
    }
    
    public function tbl_sms_history()
    {
        return $this->hasMany(Tbl_sms_history::class);
    }

    public function tbl_accreditation()
    {
        return $this->hasMany(Tbl_accreditation::class);
    }
    public function tbl_accreditation_request()
    {
        return $this->hasMany(Tbl_accreditation_request::class);
    }

    public function tbl_notification()
    {
        return $this->hasMany(Tbl_notification::class);
    }

    public function tbl_audit_trail()
    {
        return $this->hasMany(Tbl_audit_trail::class);
    }

    public function tbl_change_number()
    {
        return $this->hasMany(Tbl_change_number::class);
    }
    
}
