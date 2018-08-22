@extends('layouts.admin-app')

@section('content')

@if(count($errors)>0)
  <ul class="list-group">
    @foreach($errors->all() as $error)
        <li class="list-group-item text-danger" >
              {{ $error }}
        </li>
    @endforeach
  </ul>
@endif

<div class="panel panel-default">

  <div class="panel-heading">
    Edit website settings
  </div>

<div class="panel-body">
  <form class="" action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="form-group">
  <label for="name">Site name</label>
  <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
</div>

<div class="form-group">
  <label for="contact_email">Conatct Email</label>
  <input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
</div>

<div class="form-group">
  <label for="contact_number">Contact Phone</label>
  <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number}} ">
</div>

<div class="form-group">
  <label for="address">Address</label>
  <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
</div>

<div class="form-group">
  <div class="text-center">
    <button type="submit" class="btn btn-success btn-block" name="button">Update Settings</button>

</div>
</div>
</form>
</div>
</div>

@stop

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>

    $(document).ready(function() {
        $('#content').summernote();
    });
  </script>
</script>

@stop
