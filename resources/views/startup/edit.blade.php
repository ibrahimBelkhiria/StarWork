@extends('layouts.app')

@section('content')

    <h3>Create a Startup</h3>

    {!! Form::open(['action' => ['StartupController@update',$startup->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">

        {{Form::label('name','Name')}}
        {{Form::text('name',$startup->name,['class'=>'form-control','placeholder'=>'Name'])}}

    </div>

    <div class="form-group">
        {{Form::label('category_id','Category:')}}
        {{Form::select('category_id',$cats,$startup->category_id,['class'=>'form-control'])}}


    </div>



    <div class="form-group">

        {{Form::label('description','Description')}}
        {{Form::textarea('description',$startup->description,['class'=>'form-control','placeholder'=>'A short description of your startup..'])}}

    </div>
    {{Form::hidden('_method','PUT')}}
    <div class="form-group">

        {{Form::file('cover_image')}}

    </div>


    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}





@endsection