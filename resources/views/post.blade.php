@extends('layouts.blog-post')

@section('content')

    <h1>Post</h1>

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
        by <a href="#">{{$post->id}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>

{{--    @if(Session::has('comment_message'))--}}

{{--        {{session('comment_message')}}--}}

{{--    @endif--}}
{{--    <!-- Blog Comments -->--}}

{{--    @if(Auth::check())--}}

{{--        <!-- Comments Form -->--}}
{{--        <div class="well">--}}
{{--            <h4>Leave a Comment:</h4>--}}

{{--            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}--}}


{{--            <input type="hidden" name="post_id" value="{{$post->id}}">--}}

{{--            {{csrf_field()}}--}}
{{--            <div class="'form-group">--}}


{{--                {!! Form::label('body', 'body:') !!}--}}
{{--                {!! Form::textarea('body',null, ['class'=>'form-control', 'rows'=>3])!!}--}}
{{--                {{csrf_field()}}--}}


{{--            </div>--}}

{{--            <div class="form-group">--}}

{{--                {!! Form:: submit('Post Comment', ['class'=>'btn btn-primary'])!!}--}}
{{--                {{csrf_field()}}--}}
{{--                {!! Form::close() !!}--}}

{{--            </div>--}}

{{--            @endif--}}

{{--            <hr>--}}

{{--            <!-- Posted Comments -->--}}

{{--        @if(count($comments)>0)--}}

{{--            @foreach($comments as $comment)--}}
{{--                <!-- Comment -->--}}


{{--                    <div class="media">--}}
{{--                        <a class="pull-left" href="#">--}}
{{--                            <img height="64" class="media-object" src="{{$comment->photo}}" alt="">--}}
{{--                        </a>--}}
{{--                        <div class="media-body">--}}
{{--                            <h4 class="media-heading">{{$comment->author}}--}}
{{--                                <small>{{$comment->created_at->diffForHumans()}}</small>--}}
{{--                            </h4>--}}
{{--                            {{$comment->body}}--}}




{{--                            @if(count($comment->replies)>0)--}}

{{--                                @foreach($comment->replies as $reply)--}}



{{--                                    <div class="comment-reply-container">--}}

{{--                                        <button class="toggle-reply btn btn-primary pull-right">Open</button>--}}


{{--                                        <!--Reply section-->--}}
{{--                                        <div id="nested-comment " class="media">--}}
{{--                                            <a class="pull-left" href="#">--}}
{{--                                                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">--}}
{{--                                            </a>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h4 class="media-heading">{{$reply->author}}--}}
{{--                                                    <small>{{$reply->created_at->diffForHumans()}}</small>--}}
{{--                                                </h4>--}}
{{--                                                {{$reply->body}}--}}
{{--                                            </div>--}}

{{--                                        </div>--}}


{{--                                        @endforeach--}}
{{--                                        @endif--}}


{{--                                        <div class="hide-comment">--}}
{{--                                            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}--}}
{{--                                            {{csrf_field()}}--}}


{{--                                            <div class="'form-group">--}}

{{--                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">--}}


{{--                                                {!! Form::textarea('body',null, ['class'=>'form-control col-sm-6' , 'rows'=>1])!!}--}}
{{--                                                {{csrf_field()}}--}}


{{--                                            </div>--}}

{{--                                            <div class="form-group">--}}


{{--                                                {!! Form:: submit('Reply', ['class'=>'btn btn-primary pull-right'])!!}--}}
{{--                                                {{csrf_field()}}--}}
{{--                                                {!! Form::close() !!}--}}

{{--                                            </div>--}}

{{--                                        </div>--}}


{{--                                    </div>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}

{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <!-- Comment -->--}}

{{--                    <div>--}}
{{--                        @if(Session::has('comment_message'))--}}
{{--                            <p class="bg-danger">{{session('comment_message')}}</p>--}}

{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        @if(Session::has('reply_message'))--}}
{{--                            <p class="bg-danger">{{session('reply_message')}}</p>--}}

{{--                        @endif--}}
{{--                    </div>--}}

{{--        </div>--}}

{{--        </div>--}}
{{--@stop--}}

{{--@section('scripts')--}}

{{--    <script>--}}


{{--        $(".hide-comment .toggle-reply").click(function () {--}}

{{--            $(this).slideToggle("slow");--}}

{{--        })--}}


{{--    </script>--}}

    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://codehacking-wmaxlil2sc.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script id="dsq-count-scr" src="//codehacking-wmaxlil2sc.disqus.com/count.js" async></script>

@stop