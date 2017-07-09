<?php

namespace App\Http\Controllers;

use App\Category;
use App\Startup;
use App\StartupProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StartupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startups=Startup::all();
        return view('startup.index',compact('startups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        return view('startup.create',compact('categories'));
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
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required|integer',
            'cover_image'=>'image|nullable|max:1999',

        ]);

        //handle file  upload
        if ($request->hasFile('cover_image')){
            //get file name with extnesion
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            //get the file name
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get the extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload the image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore='noimage.jpg';
        }
        $startup=new Startup();


        $startup->name=$request->input('name');
        $startup->description=$request->input('description');
        $startup->user_id=auth()->user()->id;
        $startup->category_id=$request->category_id;
        $startup->cover_image=$fileNameToStore;
        $startup->save();
        return redirect('/startups')->with('success','Startup created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $startup=Startup::find($id);

        return view('startup.show',compact('startup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $startup= Startup::find($id);

                    $categories=Category::all();
                    $cats=array();
                    foreach ($categories as $category)
                    {
                        $cats[$category->id]=$category->name;
                    }

        if (auth()->user()->id !==$startup->user_id)
        {
            return redirect('/startups')->with('error','You are not authorized to see this !');
        }


        return view('startup.edit',compact('startup','cats'));
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
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required|integer',

        ]);
        if ($request->hasFile('cover_image')){
            //get file name with extnesion
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            //get the file name
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get the extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload the image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }

        $startup=Startup::find($id);

        $startup->name=$request->input('name');
        $startup->description=$request->input('description');
        $startup->category_id=$request->category_id;
        if ($request->hasFile('cover_image')){
            $startup->cover_image=$fileNameToStore;
        }


        $startup->save();
        return redirect('/startups')->with('success','Startup Updated');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $startup=Startup::find($id);
        if (auth()->user()->id !==$startup->user_id){
            return redirect('startups')->with('error','You are not authorized to see this !');
        }

        if ($startup->cover_image!='noimage.jpg'){
            Storage::delete('public/cover_images/'.$startup->cover_image);
        }


        $startup->delete();
        return redirect('/startups')->with('success','Startup Removed');

    }
}
