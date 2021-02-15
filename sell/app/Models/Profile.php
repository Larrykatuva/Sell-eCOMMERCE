<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // table name
    protected $table = 'profiles';
    // primary key
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;

    /*
    *Adding relationships
    */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
