@extends('layouts.app')


@section('content')

  <div class="wrapper">


    <!--page title end-->

    <!--body content start-->
    <section class="body-content ">

      <section class="page-title parallax-title-detail ">
                  <div class="container">
                      @foreach($services as $service)
                      <div class="row">
                        <div class="col-md-8 ">
                              <div class="banner-title">
                                  <h2 class="text-uppercase theme-color"> {{$service->name}}</h2>
                                  <h3 class="text-uppercase ">{{$service->address}}, {{$service->city}} ,{{$service->state}},{{$service->zipcode}}</h3>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
              </section>

        <div class="page-content">
            <div class="container">
                <div class="row">
                  <!-- INFO  -->


                  <div class="alert alert-info" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-lg fa-check-circle-o"></i>  <strong>Heads up!</strong> Your service request is recorded. Please check all the details and total amount before payment.<br>
                                   By clicking Proceed to checkout, you agree to our Terms and Conditions and Privacy policy.
                  </div>

                  <div class="col-md-6 pull-right">

@foreach($services as $service)



                        <a href="{{ route('user.cartreview', ['id' => $service->sp_id , 'service_id' => $service->id,'cart_id' => $cart->id] )}}" class="btn btn-medium btn-dark-solid btn-transparent  pull-right">  proceed to checkout</a>

@endforeach
                  </div>




                </div>
            </div>
        </div>

  </section>
    <!--body content end-->

      @include('user.footer.footer')

</div>

<script src=" {{ asset('app/js/jquery.js') }}"></script>
  <script src=" {{ asset('app/js/bootstrap.min.js') }}"></script>
  <script src=" {{ asset('app/js/menuzord.js') }}"></script>
  <script src=" {{ asset('app/js/jquery.flexslider-min.js') }}"></script>
  <script src=" {{ asset('app/js/owl.carousel.min.js') }}"></script>
  <script src=" {{ asset('app/js/jquery.isotope.js') }}"></script>
  <script src=" {{ asset('app/js/jquery.magnific-popup.min.js') }}"></script>
  <script src=" {{ asset('app/js/jquery.countTo.js') }}"></script>
  <script src=" {{ asset('app/js/smooth.js') }}"></script>
  <script src=" {{ asset('app/js/wow.min.js') }}"></script>
  <script src=" {{ asset('app/js/imagesloaded.js') }}"></script>
<!-- by mohit -->
  <script src=" {{ asset('app/js/tabform.js') }}"></script>




  </script>
  <!--common scripts-->
  <script src=" {{ asset('app/js/scripts.js') }}"></script>


  <script src=" {{ asset('app/js/jquery-ui.js') }}"></script>

<!-- FOR DATE PICKER -->
<script>
  $( "#datepicker" ).datepicker({
    inline: true,
    minDate:0,
    dateFormat: 'yy-mm-dd',
  });
</script>


<!-- FOR DRY CLEANING SERVICE DISPLAY DIV -->
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>


<script type="text/javascript">
$(document).on('click', '.number-spinner button', function () {
var btn = $(this),
  oldValue = btn.closest('.number-spinner').find('input').val().trim(),
  newVal = 0;

if (btn.attr('data-dir') == 'up') {
  newVal = parseInt(oldValue) + 1;
} else {
  if (oldValue > 1) {
    newVal = parseInt(oldValue) - 1;
  } else {
    newVal = 1;
  }
}
btn.closest('.number-spinner').find('input').val(newVal);
});
</script>




</body>
</html>
  @endsection
