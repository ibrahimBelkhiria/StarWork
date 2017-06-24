@extends('layouts.app')


@section('content')

    <a href="/startup/project/create" class="btn btn-default">Create New Project</a>
        <h2>List of Your  Projects </h2>
        @if(count($projects)>0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Project</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Client</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
        <tr>
        <td>{{$project->title}}</td>
        <td>{{$project->description}}</td>
        <td>{{$project->created_at}}</td>
        <td>{{$project->client}}</td>
         <td><a href="/startup/project/{{$project->id}}" class="btn btn-info">Details</a></td>
        </tr>
        @endforeach
        </tbody>



    </table>
    @else
            <span>You do not Have any Projects Yet Start Browsing  <a href="/client/project">From here</a> </span>
    
    @endif



@endsection