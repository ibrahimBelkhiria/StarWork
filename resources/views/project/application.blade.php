@extends('layouts.app')

@section('content')

    <h3>Application for {{$project->title}} </h3>

    <form method="POST" action='/project/application/{{$project->id}}' novalidate>
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="control-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required="required">
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="control-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required="required">
            {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
        </div>


        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            <label class="control-label">Message</label>
            <textarea class="form-control" name="message" rows="10" cols="10" required="required">{{ old('message') }}</textarea>
            {!! $errors->first('message', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default btn-block">Send &raquo;</button>
        </div>
    </form>
@endsection