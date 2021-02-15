<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request, $category){
        $products = Product::where('name', $category)
            ->orWhere('name', 'like', '%'.$category.'%')
            ->orWhere('category', 'like', '%'.$category.'%')
            ->get();

        return view('search.index')->with('products', $products);
        //return $products;
    }

    public function search(Request $request){

        $item = $request->input('item');

        if($item != null){
            $byName = Product::where('name', $item)
                ->orWhere('name', 'like', '%'.$item.'%')
                ->get();

            $byCategory = Product::where('category', 'like', '%'.$item.'%')->get();

            $byDesc = Product::where('desc', 'like', '%'.$item.'%')->get();

            $byBrand = Product::where('brand', 'like', '%'.$item.'%')->get();
            
            //$products = array_unique(array_merge($byName, $byCategory, $byDesc));
            $catalog = $byName->union($byCategory)->union($byDesc)->union($byBrand);
            $products = $catalog->unique();

            if(count($products) < 0){
                $products = null;
            }
            return view('search.index')->with('products', $products);
        }else{
            return redirect('/sell');
        }
    }
}
