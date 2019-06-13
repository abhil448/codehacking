@extends('layouts.admin')

@section('content')

<h1>Edit User</h1>
<div class="row">
    <div class="col-sm-3">

    <img src="{{$user->photo ? $user->photo->file : 'images/NoImage.png'}}" alt="" class="img-responsive img-rounded">




    </div>


    <div class="col-sm-9">

            {!!Form::model($user,['action'=>['AdminUsersController@update',$user->id],'method'=>'PATCH','files'=>true])!!}
            <div class="form-group">
            {!!Form::label('name','Name:')!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('email','Email:')!!}
                {!!Form::email('email',null,['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                    {!!Form::label('role_id','Role:')!!}
                    {!!Form::select('role_id',[''=>'choose option'] + $role,null,['class'=>'form-control'])!!}
            </div>
                    
            <div class="form-group">
                {!!Form::label('is_active','Status:')!!}
                {!!Form::select('is_active',['1'=>'Active','0'=>'Not Active'],null,['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('password','Password:')!!}
                {!!Form::password('password',['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('photo_id','Profile Photo:')!!}
                {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
            {!!Form::submit('submit',['class'=>'btn btn-success col-sm-6'])!!}
            </div>
            {!!Form::close()!!}

            {!!Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]])!!}
            <div class="form-group">
                    {!!Form::submit('Delete',['class'=>'btn btn-danger col-sm-6'])!!}
            </div>
                    {!!Form::close()!!}

    </div>
</div>

@include('includes.form_error')

@endsection