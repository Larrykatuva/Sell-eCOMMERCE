<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    // table name
    protected $table = 'product_images';
    // primary key
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;


    /*
    *Adding relationships
    */
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
