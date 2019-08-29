@extends('layouts.admin')

@section('content')



    <h1>Categories</h1>

    <div class="col-sm-6">


        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',null, ['class'=>'form-control'])!!}
            {{csrf_field()}}
        </div>
        <div class="form-group">
            {!! Form:: submit('Edit Category', ['class'=>'btn btn-primary col-sm-6'])!!}
            {{csrf_field()}}
            {!! Form::close() !!}

            <div class class="col-sm-6">
                {!! Form::open(['method' => 'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}
                {!! Form::submit('Delete category' , ['class' =>'btn btn-danger col-sm-6']) !!}
                {!! Form::close() !!}


            </div>

        </div>




        </div>


    <div class="row">
        @include('includes.form_error')


    </div>

@stop