<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the User dashboard. (the startup creator)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $startup=$user->startup;
        return view('home',compact('user','startup'));
    }

     public function profile()
     {
        return view('user_profile',array('user'=>Auth::user()));

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

         return view('user_profile',array('user'=>Auth::user()));


     }



}
