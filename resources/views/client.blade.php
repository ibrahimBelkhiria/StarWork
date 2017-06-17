@extends('layouts.app')

@section('content')

    <p class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-8">
                <strong>You can apply new project</strong>&nbsp;
                    <a href="/client/project/create" class="btn btn-success">Apply</a>
            </div>
        </div>
        <hr>

        <table id="users-table" class="table">
            <thead>
                <tr>
                    <td>Project ID</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Publish at</td>
                    <td>Last Updated </td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->price}}</td>
                        <td>{{$project->created_at->toFormattedDateString()}}</td>
                        <td>{{$project->updated_at->toFormattedDateString()}}</td>
                        <td>
                            <a href="/client/project/{{$project->id}}" class="btn btn-default">show</a>
                            <a href="/client/project/{{$project->id}}/edit" class="btn btn-primary">edit</a>
                            {!! Form::open([ 'method'  => 'delete', 'style'=>'display:inline-block', 'route' => [ 'client.project.delete', $project->id ] ]) !!}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection


