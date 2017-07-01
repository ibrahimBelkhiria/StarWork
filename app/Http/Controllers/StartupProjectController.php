<?php

namespace App\Http\Controllers;

use App\StartupProject;
use App\Task;
use Illuminate\Http\Request;

class StartupProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects= StartupProject::Where('startup_id',auth()->user()->startup->id)->get();

        return view('startupProject.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('startupProject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'title'=>'required' ,
             'description'=>'required',
             'client'=>'required',
         ]);



         $project= new StartupProject();

         $project->title=$request->input('title');
         $project->description=$request->input('description');
         $project->client=$request->input('client');
         $project->startup_id=auth()->user()->startup->id;
         $project->save();
        return redirect('/startup/project')->with('success','Project Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project= StartupProject::find($id);
        $tasks=Task::where('startupproject_id',$id)->get();

        if ($project->startup_id !==auth()->user()->startup->id)
        {
            return redirect('/startups')->with('error','You are not authorized to see this !');
        }

        return view('startupProject.show',compact('project','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=StartupProject::find($id);
        if ($project->startup_id !==auth()->user()->startup->id)
        {
            return redirect('/startups')->with('error','You are not authorized to see this !');
        }
        return view('startupProject.edit',compact('project'));
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
        $this->validate($request,[
            'title'=>'required' ,
            'description'=>'required',
            'client'=>'required',

        ]);

        $project=StartupProject::find($id);
        $project->title=$request->input('title');
         $project->description=$request->input('description');
         $project->client=$request->input('client');
        $project->save();
        return redirect('/startup/project')->with('success','Project Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=StartupProject::find($id);

        $project->delete();
        return redirect('/startup/project')->with('success','Project Removed');

    }




}
