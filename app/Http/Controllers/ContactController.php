<?php

namespace App\Http\Controllers;

use App\Mail\contactStartup;
use App\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use MercurySeries\Flashy\Flashy;

class ContactController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth:client');
    }


    public function show($id)
    {
        $startup=Startup::find($id);

        return view('startup.contact',compact('startup'));

    }

    public function store(Request $request,$id)
    {
        $startup=Startup::find($id);
        $destination=$startup->user->email;
        $name=$request->input('name');
        $message=$request->input('message');
        $sentFrom=$request->input('email');

        Mail::to($destination)->send(new contactStartup($sentFrom,$message,$name));

        Flashy('your email was sent successfully');
         return redirect()->route('client.dashboard');

    }



}
