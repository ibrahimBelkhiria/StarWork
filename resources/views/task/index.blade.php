@extends('layouts.app')


@section('content')

    @if(count($tasks)>0)
        <h3 class="text-center">List Of All Tasks </h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Task</th>
                <th>Created At</th>
                <th>Project</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->name}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>{{$task->startupProject->title}}</td>
                    <td> {!! Form::open(['action'=>['TaskController@destroy',$task->id],'method'=>'POST']) !!}

                        {{Form::hidden('_method','DELETE') }}

                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}</td>
                    <td><a href="/project/task/{{$task->id}}" class="btn btn-primary">Edit</a></td>
                </tr>
            @endforeach
            </tbody>



        </table>

      @else
            You don't have any tasks!

       @endif


@endsection