@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{$user->name}}</strong> Dashboard</div>

                <div class="panel-body">
                    Manage your startup from here <a href="startups/{{auth()->user()->startup->id}}">from here</a>
                    <div>
                    <strong>Browse projects <a href="/client/project">From Here </a> </strong>
                    </div>
                    </div>
            </div>
        </div>
    </div>

      // here we can show some projects posted by clients







</div>
@endsection
