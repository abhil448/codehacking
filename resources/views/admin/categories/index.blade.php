@extends('layouts.admin')

@section('content')
@include('includes.category_alert')


<h1>categories</h1>
<div class="col-sm-6">

    {!!Form::open(['action'=>'AdminCategoriesController@store','method'=>'POST'])!!}
        <div class="form-group">
            {!!Form::label('name','Category Name:')!!}
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Add a new category'])!!}
        </div>
            
        <div class="form-group">
            {!!Form::submit('submit',['class'=>'btn btn-success'])!!}
        </div>
      
    {!!Form::close()!!}




</div>


<div class="col-sm-6">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created_at</th>
            
          </tr>
        </thead>
        <tbody>

    @if($categories)
        @foreach($categories as $category)
          <tr>
              <td>{{$category->id}}</td>
              <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
               <td>{{$category->created_at->diffForHumans()}}</td>
            
          </tr>
        @endforeach
    @endif
        </tbody>
      </table>
</div>
@endsection
