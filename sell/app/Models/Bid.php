<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    // table name
    protected $table = 'bids';
    // primary key
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;


    /*
    *Adding relationships
    */
    public function product(){
        return $this->hasOne('App\Models\Product');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
