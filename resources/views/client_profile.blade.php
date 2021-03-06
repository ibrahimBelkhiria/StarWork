@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="/storage/avatars/{{$user->avatar}}" style="width: 150px;height: 150px;float: left;border-radius: 50%;margin-right: 25px;">
                <h2>{{$user->name}}'s Profile</h2>


                <form action="/client/profile" enctype="multipart/form-data" method="post">
                    <lavbel>Update Profile Image</lavbel>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" >

                    <input type="submit" value="update" class="btn btn-primary btn-sm pull-right">

                </form>

            </div>
        </div>
    </div>
@endsection
