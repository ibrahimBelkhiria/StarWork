@extends('layouts.app')

@section('content')

    <h3>Create a Startup</h3>

    {!! Form::open(['action' => 'StartupController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">

        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}

    </div>

        <div class="form-group">
            {{Form::label('category_id','Category:')}}

            <select name="category_id" class="form-control" >

                @foreach($categories as $category)

                    <option value="{{$category->id}}">{{$category->name}}</option>

                 @endforeach

            </select>
            
        </div>


    <div class="form-group">

        {{Form::label('description','Description')}}
        {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'A short description of your startup..'])}}

    </div>

    <div class="form-group">

        {{Form::file('cover_image')}}

    </div>


    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection