<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bid;
use App\Models\Notification;

class BidController extends Controller
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
        //
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
            'id' => 'required'
        ]);

        $id = $request->input('id');

        $product = Product::find($id);

        //getting the user
        $user = auth()->user();

        if(count($user->bids) > 0){
            return redirect('sell')->with('error', 'You cant make more than one bid!');
        }else{
            $bid = new Bid;
            $bid->user_id = $user->id;
            $bid->product_id = $product->id;
            $bid->complete = False;
            $bid->save(); 

            //creating receipient notification
            $note = new Notification;
            $note->user_id = $product->user->id;
            $note->status = 'Received';
            $note->message = 'Hello '.$user->name.' has bidded on '.$product->name.'. Please confirm with the buyer.';
            $note->read = 'False';
            $note->save();

            //creating receipient notification
            $note_me = new Notification;
            $note_me->user_id = $user->id;
            $note_me->status = 'Send';
            $note_me->message = 'You have bidded '.$product->name.' form '.$product->user->name. 'we are notifying the seller for the deal.';
            $note_me->read = 'False';
            $note_me->save();

            return redirect('sell')->with('success', 'Bid Placed Successfuly');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bid = Product::find($id);
        return view('bids.show')->with('bid', $bid);

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
}