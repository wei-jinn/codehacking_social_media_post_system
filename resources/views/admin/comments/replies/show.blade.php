@extends('layouts.admin')

@section('content')


    <h1>Comments</h1>

    @if(count($comments)>0)

        <table class="table">
            <thead>
            <tr>
                <th>No</th>
                <th>Author</th>
                <th>Replies</th>
                <th>Reply to Comment</th>
                <th>Created at</th>

            </tr>
            </thead>
            <tbody>


            @foreach($comments as $comment)
                <a></a>
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>

                    <td><a href="{{route('home.post', $comment->post->id)}})}}">View Post</a></td>


                    <td>
                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">

                                {!! Form:: submit('Disapprove', ['class'=>'btn btn-warning'])!!}
                                {{csrf_field()}}
                                {!! Form::close() !!}

                            </div>


                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">

                                {!! Form:: submit('Approve', ['class'=>'btn btn-success'])!!}
                                {{csrf_field()}}
                                {!! Form::close() !!}

                            </div>


                        @endif

                    </td>


                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                        {{csrf_field()}}

                        <div class="form-group">

                        {!! Form:: submit('Delete comment', ['class'=>'btn btn-danger'])!!}
                        {{csrf_field()}}
                        {!! Form::close() !!}

                    </td>


                </tr>



            @endforeach


            @else
                <h1 class="" text-center> No Comment </h1>

            @endif

            </tbody>
        </table>

        <div>
            @if(Session::has('approve_comment'))
                <p class="bg-info">{{session('approve_comment')}}</p>

            @else
                <p class="bg-warning">{{session('disapprove_comment')}}</p>


            @endif
        </div>

        <div>
            @if(Session::has('deleted_comment'))
                <p class="bg-danger">{{session('deleted_comment')}}</p>

            @endif
        </div>



@stop