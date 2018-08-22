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
                                        <form  class=" " action="{{ route('admin.login.submit') }}" method="post" >
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
