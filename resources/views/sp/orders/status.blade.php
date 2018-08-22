@extends('layouts.sp-app')

@section('content')
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12 mb-1">
        <h2 class="content-header-title">Order details</h2>
      </div>

    </div>


    <div class="content-body">
      <div class="row match-height">
          <!-- Description lists horizontal -->
          <div class="col-sm-12 col-md-4">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Order Information<small class="text-muted"></small></h4>
                      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                          <div class="card-text">
                              <dl class="row">
                                @foreach( $carts as $carts )
                                  <dt class="col-sm-5" >Order ID:</dt>
                                  <dd class="col-sm-7">#EZW000{{$carts->id}}</dd>
                                  <dt class="col-sm-5">Order Date:</dt>
                                  <dd class="col-sm-7">{{$carts->created_at}}</dd>
                                  <dt class="col-sm-5">Order status:</dt>
                                  <dd class="col-sm-7">Pending</dd>

                              </dl>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-8">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Service provider details: <small class="text-muted"></small></h4>
                      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                          <div class="card-text">
                              <dl class="row">
                                  <dt class="col-sm-3">Service ID:</dt>
                                  <dd class="col-sm-9">#{{$carts->service_id}}</dd>
                                  @foreach($services as $service)
                                  <dt class="col-sm-3">Service name:</dt>
                                  <dd class="col-sm-9">{{$service->name}}</dd>
                                  <dt class="col-sm-3">Service address:</dt>
                                  <dd class="col-sm-9">{{$service->address}} , {{$service->city}} , {{$service->state}},{{$service->zipcode}}</dd>
                                  @endforeach
                                  <dt class="col-sm-3 text-truncate">Reques pickup date:</dt>
                                  <dd class="col-sm-9"> {{$carts->dos}}</dd>

                              </dl>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endforeach

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip">Order Tracking</h4>
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


          <form class="form" action="{{route('sp.status.store', ['cart_id' => $carts->id, 'service_id'=>$carts->service_id, 'sp_id'=>$carts->sp_id])}}" method="post">
          {{ csrf_field() }}
            <div class="form-body">

              <div class="form-group">
                <label for="issueinput6">Status</label>
                <select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
                  <option value="Accepted">Accepted</option>
                  <option value="Out for pickup">Out for pickup</option>
                  <option value="Picked up">Picked up</option>
                  <option value="In store - Cleaning">In store - Cleaning</option>
                  <option value="Out for delivery">Out for delivery</option>
                  <option value="Delivered">Delivered</option>
                  <option value="Completed">Completed</option>
                </select>
              </div>
            </div>

            <div class="form-actions center">
                  <button type="submit" class="btn btn-primary">
                        <i class="icon-check2"></i> Update Status
                  </button>
            </div>
          </form>



        </div>
      </div>
    </div>
  </div>


</div>
<!--/ HTML Markup -->
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
