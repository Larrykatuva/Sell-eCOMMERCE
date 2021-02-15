<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('product.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'price' => 'required|max:100',
            'quantity' => 'required|max:100',
            'brand' => 'nullable|max:100',
            'location' => 'required|max:100',
            'desc' => 'required',
            'cover_image' => 'required|max:4999'
        ]);

        $user = auth()->user();

        //handle file upload
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/product_images', $fileNameToStore);
        }else{
            $fileNameToStore = $user->profile_image;
        }

        $product = new Product;
        $product->user_id = $user->id;
        $product->site_id = 1;
        $product->views = 0;
        $product->category = 'Electronics';
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->cover_image = $fileNameToStore;
        $product->brand = $request->input('brand');
        $product->price = $request->input('price');
        $product->location = $request->input('location');
        $product->desc = $request->input('desc');

        $product->save();

        return redirect('/profile')->with('success', 'Product posted successfuly');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        //update views
        $product->views = $product->views + 1;

        $product->save();
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //getting all the products
    public function allProducts(){
        $product = Product::where('user_id', auth()->user()->id)->get();
        return Datatables::of($product)
          ->addColumn('action', function($product){
             return '<a onclick="showData('.$product->id.')" class="btn btn-sm btn-success">Show</a>'.' '. 
                    '<a onclick="editForm('.$product->id.')" class="btn btn-sm btn-info">Edit</a>'.' '. 
                    '<a onclick="deleteData('.$product->id.')" class="btn btn-sm btn-danger">Delete</a>';

          })->make(true);
    }
}
