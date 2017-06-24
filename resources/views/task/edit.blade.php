@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => ['TaskController@update',$task->id],'method'=>'POST']) !!}

    <div class="form-group">
        <div class="col-md-6">
            {{Form::label('name','Edit  Task')}}
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'example:create the navbar...'])}}
        </div>
    </div>


    <div class="col-md-3">
        {{Form::submit('Save Changes',['class'=>' btn btn-primary'])}}
    </div>

    {{Form::hidden('_method','PUT')}}
    {!! Form::close() !!}







@endsection