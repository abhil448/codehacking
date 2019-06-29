@extends('layouts.blog-post')



@section('content')


    <!-- Title -->
<h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
    by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
<p class="lead">{{$post->body}}</p>
    @if(Session::has('comment_alert'))
        <div class="alert alert-success">
            {{session('comment_alert')}}
        </div>
    @endif

    <!-- Blog Comments -->
@if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
       {!!Form::open(['action'=>'PostCommentsController@store','method'=>'POST'])!!}
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <div class="form-group">
    
       {!!Form::textarea('body',null,['class'=>'form-control','rows'=>3])!!}
    </div>
    <div class="form-group">
        {!!Form::submit('submit Comment',['class'=>'btn btn-success'])!!}
        {!!Form::close()!!}
    </div>
    </div>
@endif
    <hr>

@if(count($comments) > 0)


        @foreach($comments as $comment)

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p>{{$comment->body}}</p>



            @if(count($comment->replies) > 0)


                  @foreach($comment->replies as $reply)


                        @if($reply->is_active == 1)



                        <!-- Nested Comment -->
                        <div id="nested-comment" class=" media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>
                    

                            <div class="comment-reply-container">


                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>


                                <div class="comment-reply col-sm-6">


                                        {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}
                                             <div class="form-group">

                                                 <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                                 {!! Form::label('body', 'Body:') !!}
                                                 {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                             </div>

                                             <div class="form-group">
                                                 {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                             </div>
                                        {!! Form::close() !!}


                                </div>

                          </div>
            <!-- End Nested Comment -->


                    </div>
                    @endif

                    @endforeach

           @endif

        </div>
    </div>

     @endforeach

@endif



@stop

@section('scripts')
<script>

$(".toggle-reply").click(function(){

   $(this).next().slideToggle("slow");

});


</script>


@stop





@section('sidebar')
@if($categories)
        <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @foreach($categories as $category)
                        <li><a href="#">{{$category->name}}</a>
                               </li>
                            @endforeach
                            
                        </ul>
                    </div>
                
                </div>
                <!-- /.row -->
        </div>
    @endif

@stop