@extends('layouts.admin')

@section('content')


    <h1>Edit Posts</h1>
    <div class="row">

        <div class="col-sm-6">

            <img src="{{$post->photo->file}}" alt="" class="img-responsive">

        </div>

        <div class="col-sm-6">

        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id] , 'files'=>true]) !!}
        {{csrf_field()}}
        <div class="'form-group">

            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title',null, ['class'=>'form-control'])!!}
            {{csrf_field()}}

        </div>

        <div class="'form-group">

            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control'])!!}
            {{csrf_field()}}
        </div>

        <div class="'form-group">

            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            {{csrf_field()}}

        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description:') !!}
            {!! Form::textarea('body',null, ['class'=>'form-control', 'row'=>3])!!}
            {{csrf_field()}}

        </div>

        <div>
        {!! Form:: submit('Confirm Post', ['class'=>'btn btn-primary col-sm-6'])!!}
        {{csrf_field()}}
        {!! Form::close() !!}

            <div class ="form-group">
    {!! Form::open(['method' => 'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}



        {!! Form::submit('Delete post' , ['class' =>'btn btn-danger col-sm-6']) !!}


    {!! Form::close() !!}
            </div>
    </div>

    </div>
            <div class="row">
    @include('includes.form_error')


    </div>
    </div>
@stop