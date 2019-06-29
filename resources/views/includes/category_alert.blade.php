@if(Session::has('category_alert'))


<div class="alert alert-danger">
  {{session('category_alert')}}
</div>




@endif