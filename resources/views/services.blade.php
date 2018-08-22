@extends('layouts.app')


@section('content')

  <div class="wrapper">
<!--body content start-->
<section class="body-content">

  <section class="page-title parallax-title3 ">
              <div class="container">
                  <div class="row">
                    <div class="col-md-8 ">
                          <div class="banner-title">
                              <h1 class="text-uppercase theme-color"> Our process</h1>
                              <h3 class="text-uppercase ">Clean clothes, at your fingertips</h3>
                          </div>
                      </div>
                      <!-- <div class="col-md-6 ">
                          <div class="banner-title m-top-0">
                              <h1 class="text-uppercase">About us </h1>
                          </div>
                      </div> -->
                  </div>
              </div>
          </section>


    <hr/>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h4 class="text-uppercase">Your clothing deserves the best—that’s why we only work with the best to ensure your laundry is cared for to the highest standard possible.</h4>
                    <p> "We strive for perfection, which is why we use superior technology to provide the best customer experience possible. No detail is too small."<br>
                      Our Fulfillment Center is dedicated to taking care of your laundry and dry-cleaning every step of the way—and never says no to an order.
                      Easy steps as 1-2-3</p>
                </div>
                <div class="col-md-5">
                    <!-- accordion 2 start-->
                    <dl class="accordion time-line">
                        <dt>
                            <a href="">  We pickup</a>
                        </dt>
                        <dd>
                            Schedule a pickup for now, later, and a professional Easywash concierge will swing by with custom laundry and garment bags to collect your items—so your clothes are protected in style.
                        </dd>
                        <dt>
                            <a href="">  We clean</a>
                        </dt>
                        <dd>
                          Easywash works with local partners with decades of cleaning experience. Trained associates itemize, sort, and invoice them. High-quality cleaning care is taken.
                        </dd>
                        <dt>
                            <a href="">  We deliver</a>
                        </dt>
                        <dd>
                          Your clothes are returned fresh and folded one day later. Meanwhile, you can relax with a cup of coffee (or herbal tea, if that’s your thing).
                        </dd>
                    </dl>

                    <!-- accordion 2 end-->
                </div>
            </div>
        </div>
    </div>



    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--promo box-->
                    <div class="promo-box promo-parallax round-5 m-bot-50 text-center">
                        <div class="promo-info">
                            <h3 class="theme-color">new offer for this summer</h3>
                            <span>Now wash your worries away</span>
                            <a href="/user/home" class="btn btn-medium btn-rounded btn-dark-solid  text-uppercase">Get started</a>
                        </div>
                    </div>
                    <!--promo box-->
                </div>
            </div>
        </div>
    </div>


</section>
<!--body content end-->

      @include('user.footer.footer')
<div>


<script src=" {{ asset('app/js/jquery-1.10.2.min.js') }}"></script>
<script src=" {{ asset('app/js/bootstrap.min.js') }}"></script>
<script src=" {{ asset('app/js/bootstrap') }}"></script>
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

</body>
</html>


@endsection
