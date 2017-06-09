@extends('layouts.app')


@section('content')

    <a href="/startups" class="btn btn-default">Go back</a>

    <h2>{{$startup->name}}</h2>
    <img style="width: 70px" src="/storage/cover_images/{{$startup->cover_image}}" > <span>CEO:{{$startup->user->name}}</span>
    <div><strong>Category:</strong>{{$startup->category->name}}</div>
    <p>{{$startup->description}}</p>
    <hr>

    <small>{{$startup->created_at}}  by {{$startup->user->name}}</small>
    @if(!Auth::guest())
        @if(Auth::user()->id ==$startup->user_id)
            <a href="{{$startup->id}}/edit" class="btn btn-primary">Edit</a>


            {!! Form::open(['action'=>['StartupController@destroy',$startup->id],'method'=>'POST','class'=>'pull-right']) !!}

            {{Form::hidden('_method','DELETE') }}

            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        @endif

    @endif
@endsection