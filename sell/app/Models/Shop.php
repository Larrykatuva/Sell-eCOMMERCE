<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    // table name
    protected $table = 'shops';
    // primary key
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;


    /*
    *Adding relationships
    */
    public function site(){
        return $this->belongsTo('App\Models\Shop');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
