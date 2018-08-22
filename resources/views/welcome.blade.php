@extends('layouts.app')


@section('content')
  <div id="app" class="wrapper">
          <!--hero section-->
          <div  class="full-banner  vertical-align banner-25 height-600">
              <div class="container-mid">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-6 ">
                              <div class="banner-title m-top-0">
                                  <h1 class="text-uppercase">Laundry day?</h1>
                                  <h3 class="text-uppercase">WE GOT THIS.</h3>
                                  <h3 class="text-uppercase">High-quality dry cleaning and laundry, Right at door-step</h3>
                                  <div class="m-top-30">
                                      <a href="/user/home" class="btn btn-small btn-dark-border  "> Place an order online  <i class="fa fa-arrow-right"></i> </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--hero section-->

          <!--body content start-->
          <section class="body-content">

              <div class="page-content magazine-grid">
                  <div class="container">
                      <!--feature border box start-->
                      <div class="row">

                          <div class="m-bot-80 inline-block">
                              <!--title-->
                              <div class="heading-title-alt text-center">
                                  <h3 class="text-uppercase">We are Easywash</h3>
                                  <div class="half-txt m-top-30">We built Easywash to reflect our values of delightful service, simple design, and an obsession with quality. They drive everything we do. </div>
                              </div>
                              <!--title-->
                          </div>

                          <div class="col-md-4">
                              <div class="featured-item text-right m-bot-100">
                                  <div class="icon">
                                      <i class="icon-weather_aquarius"></i>
                                  </div>
                                  <div class="title text-uppercase">
                                      <h4>DRY CLEANING AND LAUNDER & PRESS</h4>
                                  </div>
                                  <div class="desc">
                                      The perfect service for any item you want cleaned, pressed, and returned on a hanger. We always follow the care lable to ensure the highest-quality cleaning.
                                  </div>
                              </div>
                              <div class="featured-item text-right">
                                  <div class="icon">
                                      <i class="icon-scissors"></i>
                                  </div>
                                  <div class="title text-uppercase">
                                      <h4>Tailoring</h4>
                                  </div>
                                  <div class="desc">
                                      Damaged your loved clothes but can't let go. We provide services like hemming, buttoning, patching, zipping and many more.
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 text-center">
                              <div class="responsive-img fit-img  m-top-80">
                                  <img src=" {{asset('app/img/pen-box.png')}}" alt=""/>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="featured-item text-left m-bot-100">
                                  <div class="icon">
                                      <i class="icon-layers"></i>
                                  </div>
                                  <div class="title text-uppercase">
                                      <h4>WASH & FOLD </h4>
                                  </div>
                                  <div class="desc">
                                    This service is perfect for any clothing you want machine-washed, machine-dried, and returned crisply folded.
                                  </div>
                              </div>
                              <div class="featured-item text-left ">
                                  <div class="icon">
                                      <i class="icon-arrows_circle_check"></i>
                                  </div>
                                  <div class="title text-uppercase">
                                      <h4>THE HIGHEST-QUALITY CLOTHING CARE, GUARANTEED</h4>
                                  </div>
                                  <div class="desc">
                                      We know your clothes matter, and we take that very seriously. Our Easywash GUARANTEE is the best in the industry, and means you will always be satisfied or we will make it right.
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!--feature border box end-->
                  </div>
              </div>

              <hr/>



              <div class="page-content">
                  <div class="container">
                      <div class="row">
                          <div class="m-bot-20 inline-block">
                              <!--title-->
                              <div class="heading-title-alt text-center">
                                  <h3 class="text-uppercase">How Easywash works for you</h3>
                                  <div class="half-txt m-top-30">Your clothing deserves the best—that’s why we only work with the best to ensure your laundry is cared for to the highest standard possible.</div>
                              </div>
                              <!--title-->
                          </div>

                          <div class="post-list-aside">
                              <div class="post-single">
                                  <div class="col-md-6">
                                      <div class=" post-img text-center">
                                          <img src=" {{ asset('app/img/post/p14.jpg')}}" alt=""/>
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                      <div class="post-desk">

                                          <h4 class="text-uppercase">
                                             "We strive for perfection, which is why we use superior technology to provide the best customer experience possible. No detail is too small."
                                          </h4>
                                          <h4 class="text-uppercase">Easy as 1-2-3</h4>

                                          <!--  accordion time line start-->
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
                                          <!-- accordion time line end-->
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>

              <!--post-->
              <div class="img-post col-2">
                  <div class="item">
                      <div class="p-img">
                          <img src=" {{asset('app/img/post/p10.jpg')}}" alt="">
                      </div>
                      <div class="post-desk">
                          <div class="title">
                              <span class="post-sub-title text-uppercase light-txt">Partners</span>
                              <h3 class="text-uppercase light-txt">
                                  <a href="#">Your Service, We delivered</a>
                              </h3>
                          </div>
                          <p class="light-txt">
                            Partner with Easywash for a new way to make money, reach new customers, and deliver services to your customers.
                          </p>
                          <div class="m-top-10">
                              <a href="/sp/login" class="btn btn-small btn-light-solid  "> Get started  <i class="fa fa-arrow-right"></i> </a>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src=" {{asset('app/img/post/p11.jpg')}}" alt="">
                      <div class="post-desk">
                          <div class="title">
                              <span class="post-sub-title text-uppercase light-txt">Partners</span>
                              <h3 class="text-uppercase light-txt">
                                  <a href="#">Deliver the cleans</a>
                              </h3>
                          </div>
                          <p class="light-txt">
                              Deliver with Easywash and earn on your schedule. Depending on your city, you could deliver with your own vehicle.
                          </p>
                          <div class="m-top-10">
                              <a href="/user/home" class="btn btn-small btn-light-solid  "> Get started  <i class="fa fa-arrow-right"></i> </a>
                          </div>
                      </div>
                  </div>
              </div>
              <!--post-->

              <!--tabs-->
              <!-- <div class="page-content tab-parallax">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-12">


                              <section class="icon-box-tabs ">
                                  <ul class="nav nav-pills">
                                      <li class="active">
                                          <a data-toggle="tab" href="#tab-15">
                                              <i class="icon-mobile"> </i>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a data-toggle="tab" href="#tab-16">
                                              <i class="icon-documents"></i>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a data-toggle="tab" href="#tab-17">
                                              <i class="icon-lightbulb"></i>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a data-toggle="tab" href="#tab-18">
                                              <i class="icon-circle-compass"></i>
                                          </a>
                                      </li>

                                      <li class="">
                                          <a data-toggle="tab" href="#tab-19">
                                              <i class="icon-telescope"></i>
                                          </a>
                                      </li>

                                  </ul>
                                  <div class="panel-body">
                                      <div class="tab-content">
                                          <div id="tab-15" class="tab-pane active">
                                              <div class="heading-title-alt">
                                                  <span class="heading-sub-title-alt text-uppercase theme-color-">full responsive</span>
                                                  <h2 class="text-uppercase">we work together for fun</h2>
                                              </div>
                                              In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                                          </div>
                                          <div id="tab-16" class="tab-pane">
                                              <div class="heading-title-alt">
                                                  <span class="heading-sub-title-alt text-uppercase theme-color-">work for fun</span>
                                                  <h2 class="text-uppercase">Massive UI collection</h2>
                                              </div>
                                              Leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis.
                                          </div>
                                          <div id="tab-17" class="tab-pane">
                                              <div class="heading-title-alt">
                                                  <span class="heading-sub-title-alt text-uppercase theme-color-">Multipurpose</span>
                                                  <h2 class="text-uppercase">Huge possibilities</h2>
                                              </div>
                                              congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis.
                                          </div>
                                          <div id="tab-18" class="tab-pane">
                                              <div class="heading-title-alt">
                                                  <span class="heading-sub-title-alt text-uppercase theme-color-">sky is the limit</span>
                                                  <h2 class="text-uppercase">we work together for fun</h2>
                                              </div>
                                              Proin ac metus diam. In quis scelerisque velit. Leo quam aliquet diam, congue laoreet elit metus eget diam. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis.
                                          </div>
                                          <div id="tab-19" class="tab-pane">
                                              <div class="heading-title-alt">
                                                  <span class="heading-sub-title-alt text-uppercase theme-color-">responsive</span>
                                                  <h2 class="text-uppercase">Unlimited shortcode</h2>
                                              </div>
                                              Kusto ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis.
                                          </div>

                                      </div>
                                  </div>
                              </section>


                          </div>

                      </div>
                  </div>
              </div> -->
              <!--tabs-->


              <!--team member-->
              <!-- <div class="page-content">-->
              <!--team member-->

              <!--subscribe-->
              <!-- <div class="subscribe-box gray-bg round-5 page-content text-center">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-8 col-md-offset-2">
                              <div class="subscribe-info">
                                  <h3 class="theme-color ">Try the world's first laundry subscription </h3>
                                  <span class=" ">With an annual or monthly Easywash Reserve membership. <br> You'll get free delivery and other great benefits. Starting at just $9.99/mo. </span>
                              </div>
                              <div class="subscribe-form">
                                  <form class="form-inline">
                                      <input type="text" class="form-control" placeholder="Enter your email address">
                                      <button type="submit" class="btn btn-medium btn-dark-solid text-uppercase">
                                          subscribe
                                      </button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> -->
              <!--subscribe-->


              <!--clients-->
              <div class="page-content">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-8">
                              <ul class="clients angle-box grid-3 ">
                                  <li><a href="#"><img src=" {{asset('app/img/clients/c-1.png')}}" alt="Clients"></a></li>
                                  <li><a href="#"><img src=" {{asset('app/img/clients/c-2.png')}}" alt="Clients"></a></li>
                                  <li><a href="#"><img src=" {{asset('app/img/clients/c-3.png')}}" alt="Clients"></a></li>
                                  <li><a href="#"><img src=" {{asset('app/img/clients/c-4.png')}}" alt="Clients"></a></li>
                                  <li><a href="#"><img src=" {{asset('app/img/clients/c-5.png')}}" alt="Clients"></a></li>
                                  <li><a href="#"><img src=" {{asset('app/img/clients/c-6.png')}}" alt="Clients"></a></li>
                              </ul>
                          </div>
                          <div class="col-md-4">
                              <!--testimonial start-->
                              <div id="testimonial-2" class="">
                                  <div class="item left-align">
                                      <div class="tst-thumb">
                                          <img class="circle" src=" {{asset('app/img/post/a1.png')}}" alt="">
                                      </div>
                                      <div class="content">
                                          <p>

"Fantastic experience. Considering it took me MONTHS to get items dry cleaned, I am thrilled to have a service that does it for me. Can't wait to dirty some more of my nicer clothes so I can use them again."
                                          </p>
                                          <div class="testimonial-meta">
                                              - Kevin Paige -
                                              <span>ABC</span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="item left-align">
                                      <div class="tst-thumb">
                                          <img class="circle" src=" {{asset('app/img/post/a1.png')}}" alt="">
                                      </div>
                                      <div class="content">
                                          <p>
"Easywash has been a life saver. It magically appears hanging on my doorstep every Wednesday, delivered by a reliable, friendly, and trustworthy Easywash driver. Thank you for making my life simpler...and cleaner!" </p>
                                          <div class="testimonial-meta">
                                              - John Doe -
                                              <span>head of marketing, TB</span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="item left-align">
                                      <div class="tst-thumb">
                                          <img class="circle" src=" {{asset('app/img/post/a1.png')}}" alt="">
                                      </div>
                                      <div class="content">
                                          <p>
"I moved from a building with laundry to one without. Easywash is a very reasonable and convenient solution. The people that show up at my door are always prompt and courteous. I love it." </p>
                                          <div class="testimonial-meta">
                                              - Linda Smith -
                                              <span>CEO, TB</span>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                              <!--testimonial end-->
                          </div>
                      </div>
                  </div>
              </div>
              <!--clients-->


          </section>
          <!--body content end-->
          @include('user.footer.footer')


      </div>


      <!-- Placed js at the end of the document so the pages load faster -->

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
