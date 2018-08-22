<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Easywash SP Dashboard</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('app/app-assets/images/ico/apple-icon-60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('app/app-assets/images/ico/apple-icon-76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('app/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('app/app-assets/images/ico/apple-icon-152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app/app-assets/images/ico/favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('app/app-assets/images/ico/favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href=" {{ asset( 'app/app-assets/css/bootstrap.css' ) }} ">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/fonts/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/fonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/vendors/css/extensions/pace.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/vendors/css/ui/prism.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/css/colors.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/assets/css/style.css')}}">
    <!-- END Custom CSS-->
  </head>

  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    <div id="app">
    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="/sp" class="navbar-brand nav-link"><img alt="branding logo" src="{{ asset('app/app-assets/images/logo/robust-logo-dark.png')}}" data-expand="{{ asset('app/app-assets/images/logo/robust-logo-dark.png')}}" data-collapse="{{ asset('app/app-assets/images/logo/robust-logo-small.png')}}" class="brand-logo"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" target="_blank" class="btn btn-success upgrade-to-pro">Welcome to SP Dashboard</a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">

              <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">{{auth()->user()->notifications->count()}}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0">{{auth()->user()->notifications->count()}}</span></h6>
                  </li>

                          @foreach(auth()->user()->notifications as $notification)
                          <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                              <div class="media">
                                <div class="media-left valign-middle"><i class="icon-whatshot icon-bg-circle bg-cyan"></i></div>
                                <div class="media-body">
                          <p class="notification-text font-small-3 text-muted">{{$notification->data['data']}}</p><small>

                                                    </div>
                                                  </div>
                                                </a>
                                                </li>
                          @endforeach

                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all notifications</a></li>
                </ul>
              </li>



              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ asset('app/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span><span class="user-name">{{ Auth::user()->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="/sp/profile" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a>
                  <a href="/sp/messages" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a>
                  <div class="dropdown-divider"></div><a href="{{ route('sp.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>


              <!-- @auth
              <li class="dropdown dropdown-user nav-item">
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ asset('app/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span><span class="user-name">{{ Auth::user()->name }}</span></a>
                      <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item">
                        <i class="icon-head"></i> Edit Profile</a><a href="#" class="dropdown-item">
                          <i class="icon-mail6"></i> My Inbox</a><a href="#" class="dropdown-item">
                            <i class="icon-clipboard2"></i> Task</a><a href="#" class="dropdown-item">
                              <i class="icon-calendar5"></i> Calender</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('sp.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      </div>
                </li>
                      @else
                      <li class="dropdown dropdown-user nav-item">
                      <a href="{{ route('sp.login') }}" data-toggle="dropdown" class=" nav-link dropdown-user-link">
                        <span class="avatar">
                          <img src="{{ asset('app/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i>
                        </span>
                        <span class="user-name">Login/Register</span></a>
                      </li>

                    @endauth -->


            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="/sp"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
            <!-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span> -->
            <ul class="menu-content">
              <li><a href="/sp" data-i18n="nav.dash.main" class="menu-item">Dashboard</a>
              <li><a href="/" data-i18n="nav.dash.main" class="menu-item">Visit Website</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="/sp/messages/"><i class="icon-bubble"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Messages</span></a>

          </li>
          <li class=" nav-item"><a href="#"><i class="icon-user"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Profile</span></a>
            <ul class="menu-content">
              <li><a href="/sp/profile" data-i18n="nav.cards.card_statistics" class="menu-item">Edit Profile</a>
              </li>

            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-briefcase4"></i><span data-i18n="nav.project.main" class="menu-title">Services</span></a>
            <ul class="menu-content">
              <li><a href="/sp/service/create" data-i18n="nav.invoice.invoice_template" class="menu-item">Create new service</a>
              </li>
              <li><a href="/sp/service/" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item">View all services</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-price-tags"></i><span data-i18n="nav.cards.main" class="menu-title">Price Table</span></a>
            <ul class="menu-content">
              <li><a href="/sp/prices/create" data-i18n="nav.cards.card_bootstrap" class="menu-item">Create Price Table</a>
              </li>

              <li><a href="/sp/prices" data-i18n="nav.cards.card_actions" class="menu-item">Edit Price Table</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-whatshot"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Orders</span></a>
            <ul class="menu-content">
              <li><a href="/sp/orders" data-i18n="nav.cards.card_statistics" class="menu-item">View all orders</a>
              </li>

            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Payments</span></a>
            <ul class="menu-content">
              <li><a href="/sp/payments" data-i18n="nav.cards.card_statistics" class="menu-item">View all payments</a>
              </li>

            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-grid2"></i><span data-i18n="nav.components.main" class="menu-title">Comments</span></a>
            <ul class="menu-content">
              <li><a href="/sp/comments" data-i18n="nav.cards.card_statistics" class="menu-item">View Comments</a>
              </li>

            </ul>
          </li>
          </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->

@yield('content')

  <div>
  </body>
</html>
