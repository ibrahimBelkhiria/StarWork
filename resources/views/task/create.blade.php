@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => ['TaskController@store',$project->id],'method'=>'POST']) !!}

    <div class="form-group">
        <div class="col-md-6">
            {{Form::label('name','Add a Task')}}
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'example:create the navbar...'])}}
        </div>
    </div>


    <div class="col-md-3">
        {{Form::submit('Add',['class'=>' btn btn-primary'])}}
    </div>
    {!! Form::close() !!}







@endsection