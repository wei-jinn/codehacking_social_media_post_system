@extends('layouts.admin')

@section('content')

    <title>Create Users</title>
    <h1>Create Users</h1>

{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}

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
        {!! Form::select('role_id', [''=>'Options']+ $roles,null, ['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status') !!}
        {!! Form::select('is_active',array(1 => 'Active' , 0 =>'Inactive'), null, ['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div class="form-group">
        {!! Form::label('file', 'File ') !!}
        {!! Form::file('file', null,['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password: ') !!}
        {!! Form::password('password', ['class'=>'form-control'])!!}
        {{csrf_field()}}

    </div>

    <div>

        {!! Form:: submit('Create Post', ['class'=>'btn btn-primary'])!!}

        {!! Form::close() !!}

    </div>

    @include('includes.form_error')
    <div>


    </div>

    @stop