@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Client Dashboard</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <strong>You can Post new project From here! </strong>
                                <a href="/client/project/create" class="btn btn-success">Post</a>
                            </div>
                        </div>
                        <strong>Or Browse Startups <a href="/startups">From Here </a>  </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
