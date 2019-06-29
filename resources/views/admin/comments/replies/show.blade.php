
@extends('layouts.admin')



@section('content')

<h1>Replies</h1>

@if(count($replies) > 0)
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Created_at</th>
            
          </tr>
        </thead>
        <tbody>

        @foreach($replies as $reply)
          <tr>
          <td>{{$reply->id}}</td>
          <td>{{$reply->user->name}}</td>
          <td>{{$reply->email}}</td>
          <td>{{$reply->body}}</td>
          <td>{{$reply->created_at->diffForHumans()}}</td>
            <td>
            @if($reply->is_active == 1)

             {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]])!!}
             <input type="hidden" name="is_active" value="0">
             {!!Form::submit('Unapprove',['class'=>'btn btn-info col-sm-9'])!!}
             {!!Form::close()!!}

            @else
            {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]])!!}
             <input type="hidden" name="is_active" value="1">
             {!!Form::submit('Approve',['class'=>'btn btn-success col-sm-8'])!!}
             {!!Form::close()!!}
            @endif
        </td>
        <td>{!!Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]])!!}
            
                {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
        </td>
          <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
            
          </tr>
        @endforeach
    
        </tbody>
    </table>
    @else
    <h1 class="text-center">No Replies</h1>
@endif


@stop