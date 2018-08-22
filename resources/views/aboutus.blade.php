@extends('layouts.app')
@section('content')

  <div id="app" class="wrapper">
    <section class="page-title parallax-title ">
                <div class="container">
                    <div class="row">
                      <div class="col-md-8 ">
                            <div class="banner-title">
                                <h1 class="text-uppercase theme-color"> About us</h1>
                                <h3 class="text-uppercase">Our story </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <section class="body-content">
        <div class="container">
            <div class="row page-content">
                <div class="post-list-aside">
                    <div class="post-single">
                        <div class="col-md-6">
                            <div class="post-slider post-img text-center">
                                <ul class="slides">
                                    <li data-thumb="{{ asset('app/img/post/p1.jpg')}}">
                                        <a href="javascript:;" title="Freshness Photo"><img src="{{ asset('app/img/post/p3.jpg')}}" alt=""></a>
                                    </li>
                                    <li data-thumb="{{ asset('app/img/post/p2.jpg')}}">
                                        <a href="javascript:;" title="Awesome Lightbox"><img src="{{ asset('app/img/post/p2.jpg')}}" alt=""></a>
                                    </li>
                                    <li data-thumb="{{ asset('app/img/post/p3.jpg')}}">
                                        <a href="javascript:;" title="Massive UI Components"><img src="{{ asset('app/img/post/p1.jpg')}}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                              <p>If you’re anything like us, you’d rather be doing anything other than laundry. It’s time-consuming and—as anyone who’s ever shrunk a sweater down to teddy bear sizes knows—surprisingly stressful.
                              </p>
                              <p>We started Easywash to create an alternative to your typical laundry and dry cleaning experience, which too often involves confusing pricing, unclear processes or poor customer service. An alternative where delivery occurs at the tap of a button and happens around your schedule. Where people are friendly and knowledgeable about the way your clothes are treated.
                              </p>
                              <p>We also believe everyone has a right to look and feel good in clean clothes. That's why we partner with non-profits like Dress for Success to empower people to achieve economic independence through professional attire. It’s just one more step in our laundry revolution.
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-bot-80">
                <div class="col-md-12">
                    <div class="">
                      <h4 class="text-uppercase text-center theme-color">
                           We’re a laundry and dry-cleaning service that delivers at the tap of a button—so you can get back to doing what you really love.
                      </h4>
                      <p class="text-center text-uppercase">- JOHN Doe, CO-FOUNDER & CEO</p>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="heading-title text-center">
                        <h3 class="text-uppercase">WE HAVE A FABULOUS TEAM </h3>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="team-img">
                                <img src="{{ asset('app/img/team/t-s-1.jpg')}}" alt="">
                            </div>
                            <div class="team-hover">
                                <div class="s-link">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-title">
                            <h5>John Doe</h5>
                            <span>founder &amp; ceo</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="team-img">
                                <img src="{{ asset('app/img/team/t-s-2.jpg')}}" alt="">
                            </div>
                            <div class="team-hover">
                                <div class="s-link">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-title">
                            <h5>Franklin Harbet</h5>
                            <span>HR Manager</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="team-img">
                                <img src="{{ asset('app/img/team/t-s-3.jpg')}}" alt="">
                            </div>
                            <div class="team-hover">
                                <div class="s-link">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-title">
                            <h5>Linda Anderson</h5>
                            <span>Marketing Manager</span>
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
                            <a href="/user/home" class="btn btn-small btn-light-solid  "> Get started  <i class="fa fa-arrow-right"></i> </a>
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
    </section>
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
    <script src=" {{ asset('app/js/scripts.js') }}"></script>
    </body>
    </html>
    @endsection
