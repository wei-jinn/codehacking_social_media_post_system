@extends('layouts.admin')

@section('content')


    <h1>Posts</h1>
    <table class="table">
        <thead>
        <tr>
{{--            <th><input type ="checkbox" id="options"></th>--}}
            <th>ID</th>
            <th>Photo</th>
            <th>Post Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post Body</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)

{{--            {!! Form::open(['method'=>'POST', 'action'=>'DeleteMultiplePostsController@deleteMultiple']) !!}--}}


{{--            {{csrf_field()}}--}}
{{--            {{method_field('delete')}}--}}
{{--            <div class="'form-group">--}}

{{--                {!! Form::select('checkBoxArray', array('delMultiple' => 'delete ticked')) !!}--}}
{{--                {!! Form::text('name',null, ['class'=>'form-control'])!!}--}}
{{--                {{csrf_field()}}--}}


{{--            </div>--}}

{{--            <div class="form-group">--}}

{{--                {!! Form:: submit('Create Post', ['class'=>'btn btn-primary'])!!}--}}
{{--                {{csrf_field()}}--}}

{{--                </div>--}}



            @foreach($posts as $post)
<a></a>
                <tr>
{{--                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$post->id}}"></td>--}}
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category? $post->category->name : 'Uncategorised'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">View Comment</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>


                </tr>

            @endforeach

        @endif

        </tbody>
    </table>

{{--    {!! Form::close() !!}--}}
    <div class ="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}
        </div>
    </div>

    @if(Session::has('deleted_post'))
        <p class ="bg-danger">{{session('deleted_post')}}</p>

    @endif


    @stop