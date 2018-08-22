@extends('layouts.app')


@section('content')

  <div id="app" class="wrapper">
    <section class="page-title parallax-title1 ">
                <div class="container">
                    <div class="row">
                      <div class="col-md-8 ">
                            <div class="banner-title">
                                <h1 class="text-uppercase theme-color"> Contact us</h1>
                                <h3 class="text-uppercase ">Get in touch with us</h3>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
    <section class="body-content">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="text-uppercase">have you a question?</h4>
                        <form method="post" action="{{ route('contactus.postContact')}}" id="form" role="form" class="contact-comments m-top-50">
                          {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required="">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="phone" id="phone" class=" form-control" placeholder="Phone" maxlength="100">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="subject" id="subject" class=" form-control" placeholder="Subject" maxlength="100">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="message" id="text" class="cmnt-text form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-small btn-dark-solid ">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                            <div class=" m-bot-30 inline-block">
                              {!! $map['html'] !!}
                            </div>
                            <h4 class="text-uppercase">information</h4>
                            <p>600 Langsdorf Dr., Fullerton, California, 92831</p>
                            <address>
                                <p>Telp: +646 552 6603 </p>
                                <p>Fax: +646 552 6603 </p>
                                <p>Email: admin@easywash.com</p>
                            </address>
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
  {!! $map['js'] !!}
</body>
</html>
@endsection
