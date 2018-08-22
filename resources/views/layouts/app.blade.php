<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Easywash website">
  <meta name="author" content="Mohit Kirange">

  <!--favicon icon-->
  <link rel="icon" type="image/png" href=" {{ asset( 'app/img/favicon.png' ) }} ">
  <title>Easywash</title>


  <!--common style-->
<link href='http://fonts.googleapis.com/css?family=Abel|Source+Sans+Pro:400,300,300italic,400italic,600,600italic,700,700italic,900,900italic,200italic,200' rel='stylesheet' type='text/css'>
<link href=" {{ asset( 'app/css/bootstrap.min.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/font-awesome.min.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/magnific-popup.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/shortcodes/shortcodes.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/owl.carousel.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/owl.theme.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/style.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/style-responsive.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/default-theme.css' ) }} " rel="stylesheet">
  <link href=" {{ asset( 'app/css/jquery-ui.css' ) }} " rel="stylesheet">







  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<div id="app" >



<div class="wrapper">
    <!--header start-->
    <header id="header" class=" header-full-width ">

        <div class="header-sticky light-header ">

            <div class="container">
                <div id="massive-menu" class="menuzord">

                    <!--logo start-->
                    <a href="/" class="logo-brand">
                        <img class="retina" src="{{asset('app/img/logo.png')}}" alt=""/>
                    </a>
                    <!--logo end-->

                    <!--mega menu start-->
                    <ul class="menuzord-menu pull-right">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/aboutus">About Us</a></li>
                        <li><a href="/services">Our Process</a></li>
                        <li><a href="/faq">FAQs</a></li>
                        <li><a href="/contactus">Contact</a></li>


                        <li class="nav-divider" aria-hidden="true"><a href="javascript:void(0)">|</a>
                        </li>
                        @auth

                        <li class="active">
                            <a href="#">{{ Auth::user()->name }}</a>
                              <ul class="dropdown">

                                <li><a href="{{route('user.home.profile', ['user_id' => Auth::id()] ) }}">Profile</a></li>
                                  <li><a href="{{route('user.home.preferences', ['user_id' => Auth::id()] ) }}">Preferences</a></li>
                                <li><a href="{{ url('/user/home/cart/orders/1/2') }}">Orders</a></li>
                                <hr>
                                <li>
                                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                  </form>
                                </li>
                              </ul>
                          </li>
                          <li  class="nav-icon cart-info">
                              <a href="javascript:void(0)">
                                  <i class="fa fa-bell"></i>
                                  <span class="badge badge-light">{{auth()->user()->notifications->count()}}</span>
                              </a>
                              <div class="megamenu megamenu-quarter-width ">
                                  <div class="megamenu-row">
                                      <div class="col12">
                                          <table class="table cart-table-list table-responsive">
                                            @foreach(auth()->user()->notifications as $notification)
                                              <tr><td>{{$notification->data['data']}}</td></tr>
                                              
                                            @endforeach
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </li>
                                @else
                                    <li>
                                      <a class="" href="{{ route('login') }}">Sign in</a></li>
                                @endauth
                            <!-- </ul> -->

                        <!-- <li  class="nav-icon cart-info">
                            <a href="javascript:void(0)">
                                <i class="fa fa-shopping-cart"></i> cart(2)
                            </a>
                            <div class="megamenu megamenu-quarter-width ">
                                <div class="megamenu-row">
                                    <div class="col12">


                                        <table class="table cart-table-list table-responsive">
                                            <tr>
                                                <td><a href="#"><img src=" {{asset('app/img/product/1.jpg')}}" alt=""/></a></td>
                                                <td><a href="#"> Women's Top</a></td>
                                                <td>X4</td>
                                                <td>$ 122.00</td>
                                                <td><a href="#" class="close"><img src=" {{asset('app/img/product/close.png')}}" alt=""/></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#"><img src=" {{asset('app/img/product/2.jpg')}}" alt=""/></a></td>
                                                <td><a href="#"> Men's T-shirt</a></td>
                                                <td>X4</td>
                                                <td>$ 122.00</td>
                                                <td><a href="#" class="close"><img src=" {{asset('app/img/product/close.png')}}" alt=""/></a></td>
                                            </tr>
                                        </table>

                                        <div class="total-cart pull-right">
                                            <ul>
                                                <li><span>Sub Total</span> <span>$ 2000.00 </span></li>
                                                <li><span>Total </span> <span>$ 2000.00 </span></li>
                                            </ul>
                                        </div>
                                        <div class="s-cart-btn pull-right">
                                            <a href="shop-cart.html" class="btn btn-small btn-theme-color light-hover"> View cart</a>
                                            <a href="#" class="btn btn-small btn-light-solid  btn-transparent"> Checkout</a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                    <!--mega menu end-->

                </div>
            </div>
        </div>

    </header>
    <!--header end-->
    @yield('content')
</div>
</div>

  </body>
</html>
