@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
            @if(Session::has('not_admin'))
                <p class ="bg-danger">{{session('not_admin')}}</p>


            @endif
        </div>
    </div>
</div>
@endsection
