<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //render index page with user information
        $user = auth()->user();
        return view('profile.index')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //render create page with user information
        $user = auth()->user();
        return view('profile.create')->with('user', $user);
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
            'phone' => 'required',
            'cover_image' => 'nullable|max:4999',
            'gender' => 'required',
            'id' => 'required'
        ]);

        //handle file upload
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/profile_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $profile = new profile;
        $profile->user_id = auth()->user()->id;
        $profile->profile_image = $fileNameToStore;
        $profile->phone = $request->input('phone');
        $profile->gender = $request->input('gender');
        $profile->national_id = $request->input('id');

        $profile->save();

        return redirect('/profile')->with('success', 'Profile created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //render show template with user data
        $user = auth()->user();
        return view('profile.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        return view('profile.edit')->with('user', $user);
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
        $this->validate($request, [
            'phone' => 'required',
            'cover_image' => 'nullable|max:4999',
            'gender' => 'required',
            'id' => 'required'
        ]);

        $user = auth()->user();

        //handle file upload
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/profile_images', $fileNameToStore);
        }else{
            $fileNameToStore = $user->profile_image;
        }
        
        $profile = Profile::find($user->id);
        $profile->profile_image = $fileNameToStore;
        $profile->phone = $request->input('phone');
        $profile->gender = $request->input('gender');
        $profile->national_id = $request->input('id');

        $profile->save();

        return redirect('/profile')->with('success', 'Profile updated successfully');
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
