@extends('layouts.app')



@section('content')

    <h3>List of Startups</h3>
    @if(count($startups)>0)
        @foreach($startups as $startup)
            <div class="col-md-6 col-md-offset-2" >
            <div class="well ">
                <div class="row">
                    <div class="col-md-4">
                        <img style="width: 100px" src="/storage/cover_images/{{$startup->cover_image}}" >
                    </div>
                    <div class="col-md-8">
                        <h1> <a href="/startups/{{$startup->id}}"> {{$startup->name}}</a></h1>
                        <strong>CEO:{{$startup->user->name}}</strong>
                            <div><strong>Category:</strong>{{$startup->category->name}}</div>
                        <small>Creatred On {{$startup->created_at}}  </small>
                    </div>


                </div>
            </div>
            </div>
        @endforeach

    @else
        <h3>No startups found !</h3>

    @endif

@endsection