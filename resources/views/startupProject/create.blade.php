@extends('layouts.app')

@section('content')

    <h3>Start A new Project  </h3>

    {!! Form::open(['action' => 'StartupProjectController@store','method'=>'POST']) !!}

    <div class="form-group">

        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}

    </div>


    <div class="form-group">

        {{Form::label('description','Description')}}
        {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'A short description about the project..'])}}

    </div>

    <div class="form-group">

        {{Form::label('client','Client')}}
        {{Form::text('client','',['class'=>'form-control','placeholder'=>'Client\'s name'])}}

    </div>



    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection