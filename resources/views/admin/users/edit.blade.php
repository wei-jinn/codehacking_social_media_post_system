@extends('layouts.admin')

@section('content')

    <title>Edit Users</title>
    <h1>Edit Users</h1>

    <div class="row">

    <div class="col-sm-3">
       <img src="{{$user->photo? $user->photo->file : 'https://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">

    {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id] ,'files'=>true]) !!}
    {{csrf_field()}}

    <div class="'form-group">

        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name',null, ['class'=>'form-control'])!!}
        {{csrf_field()}}


    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email',null, ['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role') !!}
        {!! Form::select('role_id', $roles,null, ['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status') !!}
        {!! Form::select('is_active',array(1 => 'Active' , 0 =>'Inactive'), null, ['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', null,['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password: ') !!}
        {!! Form::password('password', ['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div>

        {!! Form:: submit('Confirm Edit', ['class'=>'btn btn-primary col-sm-6'])!!}
        {{csrf_field()}}
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}

        <div class ="form-group">

            {!! Form::submit('Delete user' , ['class' =>'btn btn-danger col-sm-6']) !!}

        </div>
            {!! Form::close() !!}




    </div>
    </div>
    </div>


    <div class="row">
        @include('includes.form_error')

    </div>

@stop