@if(Session::has('media_alert'))


<div class="alert alert-danger">
  {{session('media_alert')}}
</div>




@endif