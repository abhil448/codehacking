@if(Session::has('post_alert'))


<div class="alert alert-danger">
  {{session('post_alert')}}
</div>




@endif