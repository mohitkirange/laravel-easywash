@extends('layouts.admin-app')

@section('content')
<div class="app-content content container-fluid">
  <div class="content-wrapper">

    <section id="minimal-statistics-bg">


        <div class="row">
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card bg-cyan">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-left media-middle">
                                      <i class="icon-user1 white font-large-2 float-xs-left"></i>
                                </div>
                                <div class="media-body white text-xs-right">
                                    <h3>{{$users}}</h3>
                                    <span>Total users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card bg-cyan">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <i class="icon-user1 white font-large-2 float-xs-left"></i>
                                </div>
                                <div class="media-body white text-xs-right">
                                    <h3>{{$sps}}</h3>
                                    <span>Total SP</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card bg-deep-orange">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <i class="icon-chat1 white font-large-2 float-xs-left"></i>
                                </div>
                                <div class="media-body white text-xs-right">
                                    <h3>{{$services}}</h3>
                                    <span>Total services</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card bg-deep-orange">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <i class="icon-trending_up white font-large-2 float-xs-left"></i>
                                </div>
                                <div class="media-body white text-xs-right">
                                    <h3>{{$comments}}</h3>
                                    <span>Total comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row match-height">
            <div class="col-xl-3 col-lg-12">
              <div class="card bg-pink">
                  <div class="card-body">
                      <div class="card-block">
                          <div class="media">
                              <div class="media-left media-middle">
                                    <i class="icon-stack white font-large-2 float-xs-left"></i>
                              </div>
                              <div class="media-body white text-xs-right">
                                  <h3>{{$washandfold}}</h3>
                                  <span>Wash and fold</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card bg-pink">
                  <div class="card-body">
                      <div class="card-block">
                          <div class="media">
                              <div class="media-left media-middle">
                                    <i class="icon-stack white font-large-2 float-xs-left"></i>
                              </div>
                              <div class="media-body white text-xs-right">
                                  <h3>{{$drycleaning}}</h3>
                                  <span>Dry cleaning</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card bg-pink">
                  <div class="card-body">
                      <div class="card-block">
                          <div class="media">
                              <div class="media-left media-middle">
                                    <i class="icon-stack white font-large-2 float-xs-left"></i>
                              </div>
                              <div class="media-body white text-xs-right">
                                  <h3>{{$tailoring}}</h3>
                                  <span>Tailoring</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-xl-9 col-lg-12">
              <div class="card" style="">
                    <div class="card-header">
                        <h4 class="card-title">Recent Invoices</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="card-block">
                          <p>Total paid invoices {{$ordercount}}. <span class="float-xs-right"><a href="#">Invoice Summary <i class="icon-arrow-right2"></i></a></span></p>
                      </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Invoice#</th>
                                        <th>Customer ID</th>
                                        <th>Service ID</th>
                                        <th>SP ID</th>
                                        <th>Time</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($orders as $orders)
                                    <tr>
                                        <td class="text-truncate"><a href="#">{{$orders->id}}</a></td>
                                        <td class="text-truncate">{{$orders->user_id}}</td>
                                        <td class="text-truncate">{{$orders->service_id}}</td>
                                        <td class="text-truncate">{{$orders->sp_id}}</td>
                                        <td class="text-truncate">{{$orders->created_at}}</td>
                                        <td class="text-truncate">${{$orders->finaltotal}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="" target="_blank" class="text-bold-800 grey darken-2">EASYWASH </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
</footer>
<script src="{{ asset( 'app/app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset( 'app/app-assets/vendors/js/ui/prism.min.js')}}"></script>
<script src="{{ asset( 'app/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/js/core/app.js')}}" type="text/javascript"></script>
</body>
</html>

@endsection
