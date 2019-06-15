@extends('layouts.admin')



@section('content')

<h1>Posts</h1>
<table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>User</th>
            <th>Category_id</th>
            <th>Photo_id</th>
            <th>Title</th>
            <th>Body</th>
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
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
        @endif
        </tbody>
      </table>


@endsection