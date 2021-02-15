<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class PagesController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(12);
        return view('pages.index')->with('products', $products);
    }

    public function product(){
        return view('pages.item');
    }

    public function confirm(){
        return view('pages.confirm');
    }

    public function getLocation(){
        return '<script type="text/javascript">
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition( function(position){
                    console.log(position);
                    show( "http://maps.googleapis.com/maps/api/geocode/json?latlng="+ position.coords.latitude + "," + position.coords.longitude +"&sensor=false", function(data) {
                        console.log(data);
                    })
                });    
            }
        </script>';
    }
}
