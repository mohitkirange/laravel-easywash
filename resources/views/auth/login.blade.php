@extends('layouts.app')

@section('content')


<div class="wrapper">


    <!--body content start-->
    <section class="body-content ">


      @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                  @if ( count( $errors ) > 0 )
                       @foreach ($errors->all() as $error)
                          <div>{{ $error }}</div>
                      @endforeach
                    @endif

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
  <!-- ____________________________ORIGIANL FORM CODE_________________________________________________________________________________________________________ -->

                                      <!-- <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                          {{ csrf_field() }}

                                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                              <div class="col-md-6">
                                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                  @if ($errors->has('email'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('email') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                              <label for="password" class="col-md-4 control-label">Password</label>

                                              <div class="col-md-6">
                                                  <input id="password" type="password" class="form-control" name="password" required>

                                                  @if ($errors->has('password'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('password') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <div class="col-md-6 col-md-offset-4">
                                                  <div class="checkbox">
                                                      <label>
                                                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <div class="col-md-8 col-md-offset-4">
                                                  <button type="submit" class="btn btn-primary">
                                                      Login
                                                  </button>

                                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                                      Forgot Your Password?
                                                  </a>
                                              </div>
                                          </div>
                                      </form> -->
<!-- ____________________________________TEMPLATE FORM CODE_________________________________________________________________________________________________ -->

                                        <form  class=" " action="{{ route('login') }}" method="post" >
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

<!-- ______________________________________________ORIGGIANL REGISTER FORM_________________________________________________________________________________________ -->
<!-- <div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>
</div> -->
<!-- ___________________________________________________TEMPLATE REGISTER FORM________________________________________________________________________________________________________________                             -->
                            <dt>
                                <a href="">not a member yet? register now</a>
                            </dt>
                            <dd>
                                <form class=" login" action="{{ route('register') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input id="name" type="text"  class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
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

                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <input id="phone" type="text"  class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}" required autofocus>
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <input id="address" type="text"  class="form-control" placeholder="Address" name="address" value="{{ old('address') }}" required autofocus>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                        <input id="city" type="text"  class="form-control" placeholder="City" name="city" value="{{ old('city') }}" required autofocus>
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                        <input id="state" type="text"  class="form-control" placeholder="State" name="state" value="{{ old('state') }}" required autofocus>
                                        @if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                        <input id="zipcode" type="text"  class="form-control" placeholder="zipcode" name="zipcode" value="{{ old('zipcode') }}" required autofocus>
                                        @if ($errors->has('zipcode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('zipcode') }}</strong>
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
@include('user.footer.footer')

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
