@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Title of the project : <strong> {{ $project->title }} </strong></h3>
            <h3>Description: </h3>
            <blockquote>{{ $project->description }}</blockquote>
            <h3>Price: </h3>
            <blockquote>{{ $project->price }}</blockquote>
            <h3>Publish at: </h3>
            <blockquote>{{ $project->created_at->toFormattedDateString() }}</blockquote>
            <h3>Last update: </h3>
            <blockquote>{{ $project->updated_at->toFormattedDateString() }}</blockquote>
        </div>
        <a href="/client" class="btn btn-default">list</a>
        <a href="/client/project/{{$project->id}}/edit" class="btn btn-primary">edit</a>
    </div>
@endsection


