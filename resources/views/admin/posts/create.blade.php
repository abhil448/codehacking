@extends('layouts.admin')



@section('content')

<h1>Create Post</h1>
<div class="row">
{!!Form::open(['action'=>'AdminPostsController@store','method'=>'POST','files'=>true])!!}
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
{!!Form::submit('submit',['class'=>'btn btn-success'])!!}
</div>
{!!Form::close()!!}
</div>
@include('includes.form_error')
@endsection