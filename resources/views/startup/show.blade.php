@extends('layouts.app')


@section('content')

    <a href="/startups" class="btn btn-default">Go back</a>
        <h3>Startup Details</h3>
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
                    <script type="text/javascript">

                        $( document ).ready(function() {
                            $('.rating').on('rating.change', function (event, value, caption) {
                                var rate_id = $(this).prop('id');
                                var pure_id = rate_id.substring(6);

                                axios.post('/startup/rate', {
                                    score: value,
                                    pid: pure_id
                                }).then(function (response) {
                                        $('#' + rate_id).rating('refresh', {
                                            showClear: false,
                                            showCaption: false,
                                            disabled: true,
                                        });

                                          console.log(response.data);
                                    }).catch(function (error) {
                                        console.log(error);
                                    });

                                });
                        });

                    </script>






                    @if(auth('client')->check())
                        <label for=""> Rate this Startup</label>
         <input id="input-{{$startup->id}}" name="rating" class="rating rating-loading xs "

            value="{{$rate}}"


           data-min="0" data-max="5" data-step="0.5" data-size="xs">
                    @endif
                  <h2>{{$startup->name}}</h2>


    <img style="width: 70px" src="/storage/cover_images/{{$startup->cover_image}}" > <span><strong>CEO:</strong>{{$startup->user->name}}</span>
    <div><strong>Category: </strong>{{$startup->category->name}}</div>
    <div><strong>Description :</strong> {{$startup->description}}</div>
    <hr>

    <small><strong>Created At:</strong>{{$startup->created_at}} </small>
                </div>
    @if(!Auth::guest())
        @if(Auth::user()->id ==$startup->user_id)


            <a href="{{$startup->id}}/edit" class="btn btn-primary">Edit</a>


            {!! Form::open(['action'=>['StartupController@destroy',$startup->id],'method'=>'POST']) !!}

            {{Form::hidden('_method','DELETE') }}

            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            </div>

        @endif
   @else
        <a href="/startup/contact/{{$startup->id}}" class="btn btn-primary">Contact</a>
    @endif

        </div>
    </div>
@endsection