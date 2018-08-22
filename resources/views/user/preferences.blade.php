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
                @if($preferences->count()>0)
                <form class="form-group coupon-form" action="{{ route('user.home.preferencesupdate', ['user_id' => Auth::id()]) }}" method="post">
                  {{ csrf_field() }}
                  <div class="col-md-12">

                          <div class="heading-title-alt text-left heading-border-bottom">
                                  <h4 class="text-uppercase">Cleaning preferences</h4>
                          </div>

                          @foreach($preferences as $preferences)
                          <div class="form-group">
                              <label>Detergent</label>
                              <select name="detergent" class="form-control">
                                  <option name="detergent" value="none" @if ($preferences->detergent == "none") selected @else "" @endif > None</option>
                                  <option name="detergent" value="scented" @if ($preferences->detergent == "scented") selected @else "" @endif >Scented</option>
                                  <option name="detergent" value="hypoallergenic" @if ($preferences->detergent == "hypoallergenic") selected @else "" @endif>Hypo-Allergenic</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Fabric Softener</label>
                              <select name="fabricsoftener" class="form-control">
                                  <option name="fabricsoftener" value="yes" @if ($preferences->fabricsoftener == "yes") selected @else "" @endif>Yes</option>
                                  <option name="fabricsoftener" value="no" @if ($preferences->fabricsoftener == "no") selected @else "" @endif>No</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Starch (Laundered & Press items only)</label>
                              <select name="starch" class="form-control">
                                  <option name="starch" value="none" @if ($preferences->starch == "none") selected @else "" @endif>None</option>
                                  <option name="starch" value="light" @if ($preferences->starch == "light") selected @else "" @endif>Light</option>
                                  <option name="starch" value="medium" @if ($preferences->starch == "medium") selected @else "" @endif>Medium</option>
                                  <option name="starch" value="heavy" @if ($preferences->starch == "heavy") selected @else "" @endif>Heavy</option>
                              </select>
                          </div>
                          @endforeach

                          <button class="btn btn-small btn-dark-solid full-width  " id="login-form-submit" name="login-form-submit" value="login">Update</button>
                  </div>
                </form>


                @else
                <form class="form-group coupon-form" action="{{ route('user.home.preferencesstore', ['user_id' => Auth::id()]) }}" method="post">
                  {{ csrf_field() }}
                  <div class="col-md-12">

                          <div class="heading-title-alt text-left heading-border-bottom">
                                  <h4 class="text-uppercase">Cleaning preferences</h4>
                          </div>

                          <div class="form-group">
                              <label>Detergent</label>
                              <select name="detergent" class="form-control" value="">
                                  <option name="detergent" value="none" selected>None</option>
                                  <option name="detergent" value="scented" >Scented</option>
                                  <option name="detergent" value="hypoallergenic">Hypo-Allergenic</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Fabric Softener</label>
                              <select name="fabricsoftener" class="form-control">
                                  <option name="fabricsoftener" value="yes">Yes</option>
                                  <option name="fabricsoftener" value="no" selected>No</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label>Starch (Laundered & Press items only)</label>
                              <select name="starch" class="form-control">
                                  <option name="starch" value="none" selected>None</option>
                                  <option name="starch" value="light">Light</option>
                                  <option name="starch" value="medium">Medium</option>
                                  <option name="starch" value="heavy">Heavy</option>
                              </select>
                          </div>

                          <button class="btn btn-small btn-dark-solid full-width  " id="login-form-submit" name="login-form-submit" value="login">Store</button>
                  </div>
                </form>

                @endif
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
