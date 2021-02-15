<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // table name
    protected $table = 'products';
    // primary key
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;


    /*
    *Adding relationships
    */
    public function User(){
        return $this->belongsTo('App\User');
    }

    public function site(){
        return $this->belongsTo('App\Models\Site');
    }

    public function images(){
        return $this->hasMany('App\Product_image');
    }

    public function bid(){
        return $this->hasOne('App\Models\Bid');
    }

}
