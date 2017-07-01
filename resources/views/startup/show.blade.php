@extends('layouts.app')


@section('content')

    <a href="/startups" class="btn btn-default">Go back</a>
        <h3>Startup Details</h3>
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                <h2>{{$startup->name}}</h2>
    <img style="width: 70px" src="/storage/cover_images/{{$startup->cover_image}}" > <span><strong>CEO:</strong>{{$startup->user->name}}</span>
    <div><strong>Category: </strong>{{$startup->category->name}}</div>
    <div><strong>Description :</strong> {{$startup->description}}</div>
    <hr>

    <small><strong>Created At:</strong>{{$startup->created_at}} </small>
                </div>
    @if(!Auth::guest())
        @if(Auth::user()->id ==$startup->user_id)
            <a href="/startup/project" class="btn btn-info pull-right">Show Projects</a>

            <a href="{{$startup->id}}/edit" class="btn btn-primary">Edit</a>


            {!! Form::open(['action'=>['StartupController@destroy',$startup->id],'method'=>'POST']) !!}

            {{Form::hidden('_method','DELETE') }}

            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            </div>
            <a href="/startup/employee" class="btn btn-info">Manage employees</a>
        @endif
   @else
        <a href="/startup/contact/{{$startup->id}}" class="btn btn-primary">Contact</a>
    @endif

        </div>
    </div>
@endsection