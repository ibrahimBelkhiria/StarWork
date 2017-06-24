@extends('layouts.app')


@section('content')

    <a href="/startup/project" class="btn btn-default">Go back</a>
  <h3>Project Detail</h3>

<div class="row">
    <div class="col-md-9">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-9">

                <h3>{{$project->title}}</h3>

                <div> <strong>Created By: &ensp; </strong> {{$project->startup->user->name}}</div>
                <br>
                <div><strong>Client:&ensp;</strong>{{$project->client}}</div>
                <br>
                <div><strong>Last Updated:&ensp;</strong>{{$project->updated_at}}</div>
                <br>
                <div><strong>Created At:&ensp;</strong>{{$project->created_at}}</div>
                <br>
                <div><strong>Description:&ensp;</strong>{{$project->description}}</div>

                <br>
               <strong>Completed:</strong> <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
            </div>
                <div class="col-md-3">
                    <a href="/startup/project/{{$project->id}}/edit" class="btn btn-info pull-right">Edit</a>

                    {!! Form::open(['action'=>['StartupProjectController@destroy',$project->id],'method'=>'POST']) !!}

                    {{Form::hidden('_method','DELETE') }}

                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                </div>
            </div>
        </div>

    </div>


</div>

    <h2>Project's Tasks</h2>
    <div class="row">
        <a href="/project/{{$project->id}}/task/create" class="btn btn-primary">Add Tasks</a>

        @if(count($tasks)>0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Task</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->name}}</td>
                        <td>{{$task->created_at}}</td>

                        <td> {!! Form::open(['action'=>['TaskController@destroy',$task->id],'method'=>'POST']) !!}

                            {{Form::hidden('_method','DELETE') }}

                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        </td>
                        <td><a href="/project/task/{{$task->id}}" class="btn btn-primary">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>



            </table>

        @else
            You don't have any tasks!

        @endif





    </div>




@endsection