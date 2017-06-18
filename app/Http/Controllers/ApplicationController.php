<?php

namespace App\Http\Controllers;

use App\Mail\projectApplication;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show($id)
    {
        $project=Project::find($id);

        return view('project.application',compact('project'));

    }

    public function store(Request $request,$id)
    {
        $project=Project::find($id);
        $destination=$project->client->email;
        $name=$request->input('name');
        $message=$request->input('message');

        $sentFrom=$request->input('email');

        Mail::to($destination)->send(new projectApplication($name,$message,$sentFrom));
        Flashy('your email was sent successfully');
        redirect()->route('home');
    }






}
