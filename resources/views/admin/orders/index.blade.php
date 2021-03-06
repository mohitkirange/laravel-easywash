@extends('layouts.admin-app')

@section('content')


<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12 mb-1">
        <h2 class="content-header-title">All Orders</h2>
      </div>
      <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">

      </div>
    </div>

    @if(session('success'))
    <p class="alert alert-success alert-dismissible fade in mb-2">{{session('success')}}</p>
@endif
    <div class="content-body"><!-- Description -->

<!--/ Description -->

<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All received orders</h4>
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
                <div class="card-block card-dashboard">
                          </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-inverse">
                            <tr>
                              <th>Order ID</th>
                              <th>User ID</th>
                              <th>SP ID</th>
                              <th>Service ID</th>
                              <th>Date of Service</th>
                              <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cart->count()>0)
                            @foreach( $cart as $cart )
                            <tr>
                                <th scope="row">{{$cart->id}}</th>
                                <td>{{$cart->user_id}}</td>
                                <td>{{$cart->sp_id}}</td>
                                <td>{{$cart->service_id}}</td>
                                <td>{{$cart->dos}}</td>


                                <td><a href="{{ route('admin.orders.view', ['cart_id' => $cart->id, 'service_id'=>$cart->service_id, 'sp_id'=>$cart->sp_id])}}" class="btn btn-info  mr-1 mb-1">View</a></td>
                            </tr>
                            @endforeach

                            @else
                              <tr><th class="text-center">No Published Services</th></tr>
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table   head options end -->

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
