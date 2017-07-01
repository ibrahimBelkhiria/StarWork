@extends('layouts.app')

@section('content')

    <h3>Add an employee  </h3>

    {!! Form::open(['action' => ['EmployeeController@update',$employee->id],'method'=>'POST']) !!}

    <div class="form-group">

        {{Form::label('name','Name')}}
        {{Form::text('name',$employee->name,['class'=>'form-control','placeholder'=>'Name'])}}

    </div>


    <div class="form-group">

        {{Form::label('email','Email')}}
        {{Form::email('email',$employee->email,['class'=>'form-control'])}}

    </div>

    <div class="form-group">

        {{Form::label('role','Role')}}
        {{Form::text('role',$employee->role,['class'=>'form-control','placeholder'=>'ex:Front-end developper'])}}

    </div>
    {{Form::hidden('_method','PUT')}}


    {{Form::submit('Save changes',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection