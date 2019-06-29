@extends('layouts.admin')



@section('content')

<h1>Comments</h1>

@if(count($comments) > 0)
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

        @foreach($comments as $comment)
          <tr>
          <td>{{$comment->id}}</td>
          <td>{{$comment->user->name}}</td>
          <td>{{$comment->email}}</td>
          <td>{{$comment->body}}</td>
          <td>{{$comment->created_at->diffForHumans()}}</td>
            <td>
            @if($comment->is_active == 1)

             {!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]])!!}
             <input type="hidden" name="is_active" value="0">
             {!!Form::submit('Unapprove',['class'=>'btn btn-info col-sm-9'])!!}
             {!!Form::close()!!}

            @else
            {!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]])!!}
             <input type="hidden" name="is_active" value="1">
             {!!Form::submit('Approve',['class'=>'btn btn-success col-sm-8'])!!}
             {!!Form::close()!!}
            @endif
        </td>
        @if(count($comment->replies)>0)
        <td>
        <a class="btn btn-primary" href="{{route('admin.comment.replies.show',$comment->id)}}">View replies</a>
        </td>
        @else
        <td></td>
        @endif
        <td>{!!Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]])!!}
            
                {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
        </td>
          <td><a href="{{route('home.post',$comment->post_id)}}">View Post</a></td>
            
          </tr>
        @endforeach
    
        </tbody>
    </table>
    @else
    <h1 class="text-center">No Comments</h1>
@endif


@stop