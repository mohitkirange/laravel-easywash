@extends('layouts.sp-app')

@section('content')


<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12 mb-1">
        <h2 class="content-header-title">Create new service</h2>
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
<section id="description" class="card">
  <div class="card-header">
    <h4 class="card-title" id="basic-layout-form-center">Create New Service</h4>
    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
    <div class="heading-elements">
      <ul class="list-inline mb-0">
        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
      </ul>
    </div>
  </div>
<div class="card-body collapse in">
    <div class="card-block">
        <div class="card-text">
            <p>Use this page to create new services. Submitting following form will create new service under your bussiness name.</p>
        </div>
    </div>
</div>
</section>
<!--/ Description -->
<!-- CSS Classes -->
    <div class="row match-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="basic-layout-form-center">Create New Service</h4>
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
                <p>Fill up the following form fields.</p>
                  </div>

              <form class="form" action="{{route('sp.service.store')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-body">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Bussiness name</label>
                        <input type="text" id="eventInput1" class="form-control" placeholder="Bussiness name" name="name">
                      </div>
                    </div>
<div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Bussiness address</label>
                        <input type="text" id="eventInput2" class="form-control" placeholder="Bussiness address" name="address">
                      </div>
                      </div>
<div class="col-md-6">
                      <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="eventInput3" class="form-control" placeholder="City" name="city">
                      </div>
                      </div>
<div class="col-md-6">
                      <div class="form-group">
                        <label for="State">State</label>
                        <input type="text" id="eventInput3" class="form-control" placeholder="State" name="state">
                      </div>
                      </div>
  <div class="col-md-6">

                      <div class="form-group">
                        <label for="zipcode">Zip Code</label>
                        <input type="text" id="eventInput3" class="form-control" pattern= "[0-9]{5}" placeholder="Zip Code" name="zipcode">
                      </div>
                    </div>
<div class="col-md-6">
                      <div class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" id="eventInput4" class="form-control" placeholder="Logo" name="featured">
                      </div>
</div>
<div class="col-md-6">
                      <div class="form-group">
                        <label for="Category_id">Provided Services</label>
                          @foreach($categories as $category)
                        <div class="input-group">
                          <label class="display-inline-block custom-control custom-radio ml-1">
                            <input type="checkbox" name="category_id[]" value="{{$category->id}}" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description ml-0">{{$category->name}}</span>
                          </label>
                        </div>
                          @endforeach
                      </div>
                      </div>
<div class="col-md-6">
                      <div class="form-group">
                        <label for="workingday">Working days</label>
                          @foreach($workingday as $workingday)
                        <div class="input-group">
                          <label class="display-inline-block custom-control custom-radio ml-1">
                            <input type="checkbox" name="workingday[]" value="{{$workingday->id}}" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description ml-0">{{$workingday->name}}</span>
                          </label>
                        </div>
                          @endforeach
                      </div>
                      </div>

                        <div class="form-group">
                          <label for="content">Additional Information</label>
                          <textarea rows="5" cols="5" id="eventInput4" class="form-control" placeholder="Additional Information" name="content"></textarea>
                        </div>



                    </div>
                  </div>
                </div>

                <div class="form-actions center">
                  <!-- <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                  </button> -->
                  <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Create Service
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
