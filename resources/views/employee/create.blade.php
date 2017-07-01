@extends('layouts.app')

@section('content')

    <h3>Add an employee  </h3>

    {!! Form::open(['action' => 'EmployeeController@store','method'=>'POST']) !!}

    <div class="form-group">

        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}

    </div>


    <div class="form-group">

        {{Form::label('email','Email')}}
        {{Form::email('email','',['class'=>'form-control'])}}

    </div>

    <div class="form-group">

        {{Form::label('role','Role')}}
        {{Form::text('role','',['class'=>'form-control','placeholder'=>'ex:Front-end developper'])}}

    </div>



    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection