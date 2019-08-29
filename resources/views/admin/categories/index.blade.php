@extends('layouts.admin')

@section('content')




    <h1>Categories</h1>

    <div class="col-sm-6">


        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
        {{csrf_field()}}

        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',null, ['class'=>'form-control'])!!}
            {{csrf_field()}}
        </div>
        <div class="form-group">
            {!! Form:: submit('Create Category', ['class'=>'btn btn-primary'])!!}
            {{csrf_field()}}
        </div>
            {!! Form::close() !!}

        </div>

    <div class="col-sm-6">
    @if($categories)
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created at</th>

            </tr>
            </thead>
            <tbody>




                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href ="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() :'no date'}}</td>


                    </tr>

                @endforeach

            @endif

            </tbody>
        </table>
            @if(Session::has('deleted_cat'))
                <p class ="bg-danger">{{session('deleted_cat')}}</p>
            @endif

    </div>


@stop