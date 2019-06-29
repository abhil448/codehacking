@extends('layouts.admin')



@section('content')
@include('includes.media_alert')

<h1>Media</h1>
<div class="col-sm-10">
    @if($photos)
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created_at</th>
                
              </tr>
            </thead>
            <tbody>
    
            @foreach($photos as $photo)
              <tr>
              <td>{{$photo->id}}</td>
              <td><img height="60" width="60" src="{{$photo->file}}" alt=""></td>
              <td>{{$photo->created_at->diffForHumans()}}</td>
              <td>
                {!!Form::open(['action'=>['AdminMediaController@destroy',$photo->id],'method'=>'DELETE'])!!}
                {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}


              </td>
                
              </tr>
            @endforeach
          
            </tbody>
          </table>
    @endif
    </div>



@stop