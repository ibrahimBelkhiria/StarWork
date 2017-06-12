<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client');
    }
    public function profile()
    {
        return view('client_profile',array('user'=>Auth::user()));

    }


    public function update_avatar(Request $request)
    {

        $this->validate($request,[
            'avatar'=>'image|nullable|max:1999'
        ]);

        //handel the upload of avatar
        if ($request->hasFile('avatar')){
            //get file name with extnesion
            $filenameWithExt=$request->file('avatar')->getClientOriginalName();
            //get the file name
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get the extension
            $extension=$request->file('avatar')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload the image
            $path=$request->file('avatar')->storeAs('public/avatars',$fileNameToStore);

        }else{
            $fileNameToStore='default.jpg';
        }

        $user=Auth::user();
        $user->avatar=$fileNameToStore;
        $user->save();

        return view('client_profile',array('user'=>Auth::user()));


    }


}
