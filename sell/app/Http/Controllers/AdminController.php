<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Product;
use App\User;

class AdminController extends Controller
{
    //index function 
    public function index(){
        return view('admin.index');
    }

    //get all the users
    public function getusers(){
        $users = User::all();
        return Datatables::of($users)
          ->addColumn('action', function($users){
             return '<a onclick="showData('.$users->id.')" class="btn btn-sm btn-success">Show</a>'.' '. 
                    '<a onclick="editForm('.$users->id.')" class="btn btn-sm btn-info">Edit</a>'.' '. 
                    '<a onclick="deleteData('.$users->id.')" class="btn btn-sm btn-danger">Delete</a>';

          })->make(true);
    }

    //returning all the products
    public function catalog(){
        $catalog = Product::all();

        //return $catalog;

        $count = 0;

        $products = array();
        foreach($catalog as $c){
            $temp = array();
            $temp['id'] = $c->id;
            $temp['name'] = $c->name;
            $temp['email'] = $c->email;
            $temp['seller'] = $c->User->name;
            //array_push($products, $temp);
            $products[$count] = $temp;
            $count++;
        }
        //return $products;
        return DataTables::of($products)
            ->addColumn('action', function($products){
                return  '<a onclick="showData('.$products->id.')" class="btn btn-sm btn-success">Show</a>'.' '. 
                        '<a onclick="editForm('.$products->id.')" class="btn btn-sm btn-info">Edit</a>'.' '. 
                        '<a onclick="deleteData('.$products->id.')" class="btn btn-sm btn-danger">Delete</a>';
            });
    }
}
