<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    // table name
    protected $table = 'sites';
    // primary key
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;


    /*
    *Adding relationships
    */
    public function shops(){
        return $this->hasMany('App\Models\Shop');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
     
    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
