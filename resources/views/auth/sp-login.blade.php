@extends('layouts.sp-appOG2')

@section('content')


<div class="wrapper">


    <!--body content start-->
    <section class="body-content ">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <dl class="accordion login-accordion">
                            <dt>
                                <a href="">Login your account</a>
                            </dt>
                            <dd>
                                <div class="login register ">
                                    <div class=" btn-rounded">
                                      <form  class=" " action="{{ route('sp.login.submit') }}" method="post" >
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <input id="email" type="email" placeholder="Email ID" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required placeholder="Password">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-small btn-dark-solid full-width"  value="login">Login
                                                </button>
                                            </div>

                                            <div class="form-group">
                                                <input type="checkbox" name="remember" value="remember-me" id="checkbox1" {{ old('remember') ? 'checked' : '' }}> <label for="checkbox1">Remember  me</label>
                                                <a class="pull-right" data-toggle="modal" href="{{ route('password.request') }}"> Forgot Password?</a>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </dd>

                            <dt>
                                <a href="">not a member yet? register now</a>
                            </dt>
                            <dd>
                                <form class=" login" action="{{ route('sp.register.submit') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input id="name" type="text"  class="form-control" placeholder="Bussiness Name" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <input id="address" type="text"  class="form-control" placeholder="Bussiness Address" name="address" value="{{ old('address') }}" required autofocus>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                                        <input id="fname" type="text"  class="form-control" placeholder="First Name" name="fname" value="{{ old('fname') }}" required autofocus>
                                        @if ($errors->has('fname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                        <input id="lname" type="text"  class="form-control" placeholder="Last Name" name="lname" value="{{ old('lname') }}" required autofocus>
                                        @if ($errors->has('lname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('job_title') ? ' has-error' : '' }}">
                                        <input id="job_title" type="text"  class="form-control" placeholder="Job Title" name="job_title" value="{{ old('job_title') }}" required autofocus>
                                        @if ($errors->has('job_title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('job_title') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email"  class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- <div class="form-group">
                                        <input type="text"  class="form-control" placeholder="Phone">
                                    </div> -->

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password"  class="form-control" placeholder="Choose Password" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password"  class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-small btn-dark-solid full-width " id="login-form-submit"
                                                name="login-form-submit" value="login">Register
                                        </button>
                                    </div>


                                </form>
                            </dd>

                        </dl>
                    </div>
                </div>
            </div>

        </div>


    </section>
    <!--body content end-->

    <!--footer start 1-->
    <footer id="footer" class="dark">
        <div class="primary-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="m-bot-20 footer-logo">
                            <img class="retina" src="img/logo-dark.png" alt=""/>
                        </a>

                        <p>Massive is fully responsible, performance oriented and SEO optimized, retina ready WordPress
                            theme.</p>

                    </div>
                    <div class="col-md-3">
                        <h5 class="text-uppercase">recent posts</h5>
                        <ul class="f-list">
                            <li><a href="#">Standard Blog post</a></li>
                            <li><a href="#">Quotation post</a></li>
                            <li><a href="#">Audio Post</a></li>
                            <li><a href="#">Massive Video Demo</a></li>
                            <li><a href="#">Blog Image Post</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-uppercase">quick link</h5>
                        <ul class="f-list">
                            <li><a href="#">About Massive</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-uppercase">Recent Work</h5>
                        <ul class="r-work">
                            <li>
                                <a href="#"><img src="img/recent-work/1.jpg" alt=""/></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/recent-work/2.jpg" alt=""/></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/recent-work/3.jpg" alt=""/></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/recent-work/4.jpg" alt=""/></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/recent-work/5.jpg" alt=""/></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/recent-work/6.jpg" alt=""/></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/recent-work/7.jpg" alt=""/></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/recent-work/8.jpg" alt=""/></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="secondary-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="m-top-10">Copyright 2012 - 2015 Massive Theme by <a href="http://themebucket.net/"
                                                                                         class="f-link" target="_blank">ThemeBucket</a> | All Rights Reserved</span>
                    </div>
                    <div class="col-md-6">
                        <div class="social-link circle pull-right">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer 1 end-->

</div>

<!-- Placed js at the end of the document so the pages load faster -->

<script src=" {{ asset('app/js/jquery-1.10.2.min.js') }}"></script>
<script src=" {{ asset('app/js/bootstrap.min.js') }}"></script>
<script src=" {{ asset('app/js/menuzord.js') }}"></script>
<script src=" {{ asset('app/js/jquery.flexslider-min.js') }}"></script>
<script src=" {{ asset('app/js/owl.carousel.min.js') }}"></script>
<script src=" {{ asset('app/js/jquery.isotope.js') }}"></script>
<script src=" {{ asset('app/js/jquery.magnific-popup.min.js') }}"></script>
<script src=" {{ asset('app/js/smooth.js') }}"></script>
<script src=" {{ asset('app/js/wow.min.js') }}"></script>
<script src=" {{ asset('app/js/imagesloaded.js') }}"></script>
<!--common scripts-->
<script src=" {{ asset('app/js/scripts.js') }}"></script>

</body>
</html>
@endsection
