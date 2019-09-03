@extends('layouts.admin')

@section('content')


    <h1>Create Posts</h1>
<div class="row">
    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
    {{csrf_field()}}
    <div class="'form-group">

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title','new post', ['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div class="'form-group">

        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('category_id',$categories, null, ['class'=>'form-control'])!!}
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

    {!! Form:: submit('Create Post', ['class'=>'btn btn-primary'])!!}
    {{csrf_field()}}
    {!! Form::close() !!}
</div>
    @include('includes.form_error')


@stop