@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Title of the project : <strong> {{ $project->title }} </strong></h3>
            <h3>Description: </h3>
            <blockquote>{{ $project->description }}</blockquote>
            <h3>Price: </h3>
            <blockquote>{{ $project->price }} $</blockquote>
            <h3>Publish at: </h3>
            <blockquote>{{ $project->created_at->toFormattedDateString() }}</blockquote>
            <h3>Last update: </h3>
            <blockquote>{{ $project->updated_at->toFormattedDateString() }}</blockquote>
        </div>
        <a href="/client/project" class="btn btn-default">list</a>
        @if(!auth('client')->guest())
            @if(auth('client')->user()->id ==$project->client_id)
        <a href="/client/project/{{$project->id}}/edit" class="btn btn-primary">edit</a>
                {!! Form::open([ 'method'  => 'delete', 'style'=>'display:inline-block', 'route' => [ 'client.project.delete', $project->id ] ]) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            @endif
        @else

            <div>Send an application</div>
            <a href="/project/application/{{$project->id}}" class="btn btn-primary">Apply</a>
        @endif
    </div>
@endsection


