@extends('layouts.app')


@section('content')
  <div class="wrapper">
    @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
    <div class="banner-state vertical-align banner-p height-600">
        <div class="container-mid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="banner-title" >
                            <h2 class="text-uppercase m-bot-10 inline-block">Summer season sale</h2>
                            <h1 class="text-uppercase theme-bg theme-bg-space light-txt m-bot-30">up to 15% off </h1>
                            <p class="p-top-30">Enjoy the California summer with clean clothes<br/>
                            Limited time offer. Wash your worries away</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <section class="body-content">
            <div class="page-content product-grid">
                <div class="container">
                    <div class="row">
                      <div class="col-md-9">
                            <div class="clearfix m-bot-30 inline-block">

                              <div class="pull-left">
                                  <form method="post" action="#">
                                      <select class="form-control">
                                          <option>Default sorting</option>
                                          <option>Sort by popularity</option>

                                      </select>
                                  </form>
                              </div>



                                <!-- <div class="pull-left m-top-5 m-left-10">
                                    Showing 1–10 of 55 results
                                </div> -->

                                <div class="pull-right shop-view-mode">
                                    <a href="#"> <i class="fa fa-th-large"></i>
                                    </a>
                                    <a href="#"> <i class="fa fa-th-list"></i>
                                    </a>
                                </div>
                            </div>

                          <div class="row">
                            @if($services->count()>0)
                            @foreach( $services as $service )
                                <div class="col-md-4">
                                    <!--product list-->
                                    <div class="product-list">
                                        <div class="product-img">
                                            <a href="#"><img src="{{$service->featured}}" width="262.48px" height="262.48px" alt=""/></a>
                                            <div class="sale-label">
                                                Sale
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <a href="{{ route('user.home.details', ['id' => $service->sp_id , 'service_id' => $service->id] )}}">
                                              {{$service->name}}</a>
                                        </div>
                                        <div class="product-title">
                                            {{$service->address}} {{$service->city}}<br> {{$service->state}}.{{$service->zipcode}}.
                                        </div>
                                        <!-- <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div> --><br>
                                        <div class="product-btn">
                                            <a href="{{ route('user.home.details', ['id' => $service->sp_id , 'service_id' => $service->id] )}}" class="btn btn-extra-small btn-dark-border  "><i class="fa fa-arrow-right"></i>View More</a>
                                        </div>
                                    </div>
                                    <!--product list-->
                                </div>
                            @endforeach

                            <div class="text-center col-md-12">
                                  <ul class="pagination custom-pagination">
                                      {{ $services->links()}}
                                  </ul>
                            </div>
                          </div>
                            @else
                            <div class="col-md-12">
                              <h3>No Published Services</h3>
                            </div>

                            @endif
                      </div>

                      <div class="col-md-3 ">
                            <div class="widget">
                                <div class="heading-title-alt text-left heading-border-bottom">
                                    <h6 class="text-uppercase">product category</h6>
                                </div>
                                <ul class="widget-category">
                                  <li><a href="{{ route('user.home.categoryindex', ['cid' => 1] )}}" class="">Laundry</a></li><br>
                                  <li><a href="{{ route('user.home.categoryindex', ['cid' => 2] )}}" class="">Dry Cleaning</a></li><br>
                                  <li><a href="{{ route('user.home.categoryindex', ['cid' => 4] )}}" class="">Tailoring</a></li><br>
                                  <li><a href="{{ route('user.home.categoryindex', ['cid' => 3] )}}" class="">Other</a></li><br>

                                </ul>
                            </div>

                      </div>
                    </br></br>
                      <div class="col-md-3 ">

                      </div>

                    </div>
                </div>
              </div>
            </section>
          <!--body content end-->

        @include('user.footer.footer')
      </div>


      <!-- Placed js at the end of the document so the pages load faster -->
      <script src=" {{ asset('app/js/app.js') }}"></script>
        <script src=" {{ asset('app/js/jquery.js') }}"></script>
        <script src=" {{ asset('app/js/bootstrap.js') }}"></script>

      <!-- <script src=" {{ asset('app/js/bootstrap.min.js') }}"></script> -->
      <script src=" {{ asset('app/js/menuzord.js') }}"></script>
      <script src=" {{ asset('app/js/jquery.flexslider-min.js') }}"></script>
      <script src=" {{ asset('app/js/owl.carousel.min.js') }}"></script>
      <script src=" {{ asset('app/js/jquery.isotope.js') }}"></script>
      <script src=" {{ asset('app/js/jquery.magnific-popup.min.js') }}"></script>
      <script src=" {{ asset('app/js/jquery.countTo.js') }}"></script>
      <script src=" {{ asset('app/js/smooth.js') }}"></script>
      <script src=" {{ asset('app/js/wow.min.js') }}"></script>
      <script src=" {{ asset('app/js/imagesloaded.js') }}"></script>
      <!--common scripts-->
      <script src=" {{ asset('app/js/scripts.js') }}"></script>

      <script src=" {{ asset('app/js/jquery-ui.js') }}"></script>




    </body>
    </html>


    @endsection
