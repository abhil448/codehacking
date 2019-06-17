@extends('layouts.admin')



@section('content')

<h1>Create Post</h1>
<div class="row">
        <div class="col-sm-3">

         <img src="{{$post->photo ? $post->photo->file : 'images/NoImage.png'}}" alt="" class="img-responsive img-rounded">
            
            
            
            
        </div>

    <div class="col-sm-9">
        {!!Form::model($post,['action'=>['AdminPostsController@update',$post->id],'method'=>'PATCH','files'=>true])!!}
        <div class="form-group">
        {!!Form::label('title','Title:')!!}
        {!!Form::text('title',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('category_id','Category:')!!}
            {!!Form::select('category_id',[''=>'choose category'] + $categories,null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
                {!!Form::label('body','Body:')!!}
                {!!Form::textarea('body',null,['class'=>'form-control'])!!}
        </div>
                
        <div class="form-group">
            {!!Form::label('photo_id','Post Photo:')!!}
            {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
         {!!Form::submit('Update',['class'=>'btn btn-success col-sm-6'])!!}
        </div>
           {!!Form::close()!!}
            {!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])!!}
        <div class="form-group">
            {!!Form::submit('Delete',['class'=>'btn btn-danger col-sm-6'])!!}
        </div>
            {!!Form::close()!!}
    </div>
</div>
@include('includes.form_error')
@endsection