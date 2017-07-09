@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>List of Projects</h1>


    <hr>

    <table id="users-table" class="table">
        <thead>
        <tr>
            <td>Title</td>
            <td>Description</td>
            <td>Price</td>
            <td>Posted By</td>
            <td>Publish at</td>
            <td>Last Updated </td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->price}} $</td>
                <td>{{$project->client->name}}</td>
                <td>{{$project->created_at->toFormattedDateString()}}</td>
                <td>{{$project->updated_at->toFormattedDateString()}}</td>
                <td>
                    <a href="/client/project/{{$project->id}}" class="btn btn-default">show</a>
                    @if(!auth('client')->guest())
                        @if(auth('client')->user()->id ==$project->client_id)
                    <a href="/client/project/{{$project->id}}/edit" class="btn btn-primary">edit</a>
                    {!! Form::open([ 'method'  => 'delete', 'style'=>'display:inline-block', 'route' => [ 'client.project.delete', $project->id ] ]) !!}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>
@endsection


