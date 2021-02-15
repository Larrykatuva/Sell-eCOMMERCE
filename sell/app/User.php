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
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

    /*
    *Adding relationships
    */
    public function userProfile(){
        return $this->hasOne('App\Models\Profile');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    public function bids(){
        return $this->hasMany('App\Models\Bid');
    }

    public function user(){
        return $this->hasMany('App\Models\Notification');
    }
}
