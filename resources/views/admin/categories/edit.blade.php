@extends('layouts.admin')

@section('content')



<h1>categories</h1>
<div class="col-sm-6">

    {!!Form::model($category,['action'=>['AdminCategoriesController@update',$category->id],'method'=>'PATCH'])!!}
        <div class="form-group">
            {!!Form::label('name','Category Name:')!!}
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Add a new category'])!!}
        </div>
            
        <div class="form-group">
            {!!Form::submit('Update',['class'=>'btn btn-success col-sm-6'])!!}
        </div>
      
    {!!Form::close()!!}

     {!!Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]])!!}
    <div class="form-group">
            {!!Form::submit('Delete',['class'=>'btn btn-danger col-sm-6'])!!}
    </div>
            {!!Form::close()!!}



</div>


<div class="col-sm-6">
</div>
@endsection
