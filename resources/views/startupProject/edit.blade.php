@extends('layouts.app')

@section('content')

    <h3>Edit {{$project->title}}  </h3>

    {!! Form::open(['action' => ['StartupProjectController@update',$project->id],'method'=>'POST']) !!}

    <div class="form-group">

        {{Form::label('title','Title')}}
        {{Form::text('title',$project->title,['class'=>'form-control','placeholder'=>'Title'])}}

    </div>


    <div class="form-group">

        {{Form::label('description','Description')}}
        {{Form::textarea('description',$project->description,['class'=>'form-control','placeholder'=>'A short description about the project..'])}}

    </div>

    <div class="form-group">

        {{Form::label('client','Client')}}
        {{Form::text('client',$project->client,['class'=>'form-control','placeholder'=>'Client\'s name'])}}

    </div>
    {{Form::hidden('_method','PUT')}}


    {{Form::submit('Save Changes',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection