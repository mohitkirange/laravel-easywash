@extends('layouts.app')


@section('content')

  <div id="app" class="wrapper">

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


    <!--body content start-->
    <section class="body-content">
        <div class="page-content">

            <div class="container">

              <form>
                  {{ csrf_field() }}
                <div class="row">

                    <div class="col-md-6">
                      <div class="heading-title-alt text-left heading-border-bottom">
                              <h4 class="text-uppercase">Profile</h4>
                      </div>

                          <div class="form-group">
                              User ID:<input class="form-control" value="{{Auth::user()->id}}" required autofocus>
                            </div>

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              Name: <input id="name" type="text"  class="form-control" placeholder="Name" name="name" value="{{Auth::user()->name}}" required autofocus>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              Email:<input id="email" type="email"  class="form-control" placeholder="Email" name="email" value="{{Auth::user()->email}}" required>
                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                              Phone:<input id="phone" type="text"  class="form-control" placeholder="Phone" name="phone" value="{{Auth::user()->phone}}" required autofocus>
                              @if ($errors->has('phone'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                          </div>

                    </div>
                  </form>

                  <form class="form-group" action="{{ route('user.home.profileupdate', ['user_id' => Auth::id()]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                      <div class="heading-title-alt text-left heading-border-bottom">
                              <h4 class="text-uppercase">Address</h4>
                      </div>

                          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                              Address:<input id="address" type="text"  class="form-control" placeholder="Address" name="address" value="{{Auth::user()->address}}" required autofocus>
                              @if ($errors->has('address'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                              City:<input id="city" type="text"  class="form-control" placeholder="City" name="city" value="{{ Auth::user()->city }}" required autofocus>
                              @if ($errors->has('city'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('city') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                              State:<input id="state" type="text"  class="form-control" placeholder="State" name="state" value="{{Auth::user()->state}}" required autofocus>
                              @if ($errors->has('state'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('state') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                              Zipcode:<input id="zipcode" type="text"  class="form-control" placeholder="zipcode" name="zipcode" value="{{Auth::user()->zipcode }}" required autofocus>
                              @if ($errors->has('zipcode'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('zipcode') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <button class="btn btn-small btn-dark-solid full-width  " id="login-form-submit"
                                  name="login-form-submit" value="login">Update
                          </button>
                    </div>
                      </form>
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
