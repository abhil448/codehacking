@if(Session::has('user_alert'))


<div class="alert alert-danger">
  {{session('user_alert')}}
</div>




@endif