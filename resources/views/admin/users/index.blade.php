@extends('layouts.admin')

@section('content')

<h1>Users</h1>
<table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created_at</th>
            <th>Updated_at</th>
          </tr>
        </thead>
        <tbody>

          @if($users)
            @foreach($users as $user)
            <tr>
            <td>{{$user->id}}</td>
            <td><img height="60" width="60" src="{{$user->photo ? $user->photo->file : "/images/NoImage.png"}}" alt=""></td>
            <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active':'Not active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
        @endif
        </tbody>
      </table>
@endsection
