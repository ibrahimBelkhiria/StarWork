@extends('layouts.app')


@section('content')

    <a href="/startup/employee/create" class="btn btn-default">Add A new Employee</a>
    <h2>List of Your  Employees </h2>
    @if(count($employees)>0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Employee</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->created_at}}</td>
                    <td>{{$employee->role}}</td>
                    <td><a href="/startup/employee/{{$employee->id}}/edit" class="btn btn-info">Edit</a>
                       {!! Form::open(['action'=>['EmployeeController@destroy',$employee->id],'method'=>'POST']) !!}

                        {{Form::hidden('_method','DELETE') }}

                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    </td>
                </tr>
            @endforeach
            </tbody>



        </table>
    @else
        <span> You do not Have any Employees Yet ! </span>

    @endif



@endsection