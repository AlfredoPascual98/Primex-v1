@if($errors->all() as $error)
@foreach (errors->all() as $error)
<div class="text-danger">{{$error}}</div> 
@endforeach
@endif