
    @extends('layouts.sp-app')

    @section('content')


    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Edit profile</h2>
          </div>

        </div>

        @if(count($errors)>0)

            @foreach($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade in mb-2" >
                      {{ $error }}
                </p>
            @endforeach

        @endif

        @if(session('success'))
        <p class="alert alert-success alert-dismissible fade in mb-2">{{session('success')}}</p>
    @endif

        <div class="content-body"><!-- Description -->
  
    <!--/ Description -->
    <!-- CSS Classes -->
    <div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title" id="basic-layout-card-center">Edit profile</h4>
      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
          <li><a data-action="reload"><i class="icon-reload"></i></a></li>
          <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
          <li><a data-action="close"><i class="icon-cross2"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="card-body collapse in">
      <div class="card-block">
        <div class="card-text">
          </div>
        <form class="form" action="{{route('sp.profile.update') }}" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}
          <div class="form-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="form-group">
              <label for="eventRegInput1">Bussiness Name</label>
              <input type="text" id="eventRegInput1" class="form-control" placeholder="name" name="name" value="{{Auth::user()->name}}">
            </div>
          </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <div class="form-group">
              <label for="eventRegInput2">Bussiness address</label>
              <input type="text" id="eventRegInput2" class="form-control" placeholder="address" name="address" value="{{Auth::user()->address}}">
            </div>
          </div>
<div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
            <div class="form-group">
              <label for="eventRegInput3">First Name</label>
              <input type="text" id="eventRegInput3" class="form-control" placeholder="fname" name="fname" value="{{Auth::user()->fname}}">
            </div>
          </div>
<div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
            <div class="form-group">
              <label for="eventRegInput4">Last Name</label>
              <input type="text" id="eventRegInput4" class="form-control" placeholder="lname" name="lname" value="{{Auth::user()->lname}}">
            </div>
          </div>
<div class="form-group{{ $errors->has('job_title') ? ' has-error' : '' }}">
            <div class="form-group">
              <label for="eventRegInput5">Job title</label>
              <input type="text" id="eventRegInput5" class="form-control" name="job_title" placeholder="job_title" value="{{Auth::user()->job_title}}">
            </div>
          </div>


          </div>

          <div class="form-actions center">

            <button type="submit" class="btn btn-primary">
              <i class="icon-check2"></i> Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="" target="_blank" class="text-bold-800 grey darken-2">EASYWASH </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset( 'app/app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset( 'app/app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset( 'app/app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>


    <script src="{{ asset( 'app/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset( 'app/app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset( 'app/app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset( 'app/app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
    <script src="{{ asset( 'app/app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset( 'app/app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script type="text/javascript" src="{{ asset( 'app/app-assets/vendors/js/ui/prism.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset( 'app/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{ asset( 'app/app-assets/js/core/app.js')}}" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    </body>
    </html>

    @endsection
