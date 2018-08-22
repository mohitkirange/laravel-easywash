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
<div class="wrapper">
    <!--header start-->
    <header id="header" class=" header-full-width ">

        <div class="header-sticky light-header ">

            <div class="container">
                <div id="massive-menu" class="menuzord">

                    <!--logo start-->
                    <a href="index.html" class="logo-brand">
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
                        <!-- <li class="list-group-item">
                          <a href="/sp">Home</a>

                        </li>
                        <li class="list-group-item">
                          <a href="/sp/profile/edit">Edit Profile</a>
                        </li>
                        <li class="list-group-item">
                          <a href="/sp/service/create">Create New Service</a>
                        </li>

                        <li class="list-group-item">
                          <a href="/sp/service/">View all Service</a>
                        </li>

                        <li class="list-group-item">
                          <a href="/sp/prices/create">Create Prices table</a>
                        </li>
                        <li class="list-group-item">
                          <a href="/sp/prices"> Edit Prices table</a>

                        </li> -->


                        <li  class="nav-icon nav-divider">
                            <a href="javascript:void(0)">|</a>
                        </li>

                        @auth

                        <li class="active">
                            <a href="#">{{ Auth::user()->name }}</a>
                              <ul class="dropdown">
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
                                @else
                                    <li><a href="{{ route('sp.login') }}">Sign in</a></li>
                                @endauth
                            <!-- </ul> -->


                    </ul>
                    <!--mega menu end-->

                </div>
            </div>
        </div>

    </header>
    <!--header end-->
    @yield('content')
</div>



  </body>
</html>
