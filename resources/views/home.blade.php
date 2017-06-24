@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{$user->name}}</strong> Dashboard</div>

                <div class="panel-body">
                    Create New Startup <a href="startups/create">from here</a>

                </div>
            </div>
        </div>
    </div>

      // here we can show some projects posted by clients







</div>
@endsection
