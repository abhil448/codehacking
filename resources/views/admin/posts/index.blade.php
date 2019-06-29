@extends('layouts.admin')



@section('content')
@include('includes.post_alert')

<h1>Posts</h1>
<table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>User</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>show</th>
            <th>Created_at</th>
            <th>Updated_at</th>
          </tr>
        </thead>
        <tbody>

          @if($posts)
            @foreach($posts as $post)
            <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
            <td><img height="60" width="60" src="{{$post->photo ? $post->photo->file : "/images/NoImage.png"}}" alt=""></td>
            <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
            <td>{{str_limit($post->body,20)}}</td>
            <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
            <td><a href="{{route('admin.comments.show',$post->id)}}">View Comment</a></td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
        @endif
        </tbody>
      </table>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-4">
          {{$posts->render()}}
        </div>
      </div>


@endsection