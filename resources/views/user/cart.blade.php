@extends('layouts.app')


@section('content')

  <div class="wrapper">

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
    <!--page title end-->

    <!--body content start-->
    <section class="body-content ">

        <div class="page-content">
            <div class="container">
                <div class="row">
                  <!-- INFO  -->
                  <div class="col-md-12">

                      <!--INFO ENDS -->

                              <!-- accordion 2 start-->
                              <dl class="accordion">
                                <dt>
                                  <a href="#">Service Provider Details</a>
                                </dt>
                                <dd>
@foreach($services as $services)
                                        <div class="table-responsive">
                                          <table class="table cart-table">
                                            <tr>
                                              <td class="col-md-3">
                                                  <img src="{{$service->featured}}" alt="Logo" width="200px" height="200px" class="img-responsive" />
                                              </td>
                                              <td class="col-md-9">
                                                <div class=" text-left">
                                                  <h3 class="text-uppercase">{{$service->name}}</h3>
                                                  <span class="text-uppercase">{{$service->address}} {{$service->city}} {{$service->state}}.{{$service->zipcode}}</span><br>
                                                  @for($i=1; $i <= 5 ; $i++)
                                                    <p class="fa fa-star{{ ($i <= $avg_rating) ? '' : '-o'}}"></p>
                                                  @endfor
                                                  (<strong class="number-item">{{$avg_rating}}</strong>  /&nbsp5)
                                                </div>

                                              <div class="col-md-4">
                                                <ul class="portfolio-meta m-bot-10 m-top-10 stock">
                                                  <li><span> Provided Services: </span><br>
                                                    @foreach( $categories as $category )
                                                    {{$category->name}}<br>
                                                    @endforeach
                                                  </li>
                                                </ul>
                                              </div>

                                              <div class="col-md-4">
                                                <ul class="portfolio-meta m-bot-10 m-top-10 stock">
                                                  <li><span> Working Days: </span><br>
                                                    @foreach($workingdays as $workingdays)
                                                      {{$workingdays->name}}<br>
                                                      @endforeach
                                                  </li>
                                                </ul>
                                              </div>

                                              </td>
                                            </tr>
                                          </table>
                                        </div>
@endforeach

                                </dd>
                                    <dt><a href="">Select service and date</a>
                                    </dt>

                                    <dd>

                                      <form class="form-inline" action="{{route('user.cart.store',['id' => $service->sp_id , 'service_id' => $service->id])}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                      <div class="form-inline coupon-form">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <!--tabs border start-->
                                                  <div class="wizard">
                                                  <div class="wizard-inner">
                                                  <section class="normal-tabs">
                                                      <ul class="nav nav-tabs" role="tablist">
                                                          <li role="presentation" class="active" >
                                                              <a data-toggle="tab" href="#step1" aria-controls="step1" role="tab" title="Step 1">Wash and Fold</a>
                                                          </li>
                                                          <li role="presentation" class="disabled">
                                                              <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">Dry Cleaning</a>
                                                          </li>
                                                          <li role="presentation" class="disabled">
                                                              <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">Tailoring</a>
                                                          </li>
                                                          <li role="presentation" class="disabled">
                                                              <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">Almost there</a>
                                                          </li>
                                                      </ul>
                                                      <div class="panel-body">
                                                          <div class="tab-content">

                                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                                <h3>Wash and Fold</h3>
                                                                <p>Note: If you have both wash & fold and dry cleaning, please separate the two into different laundry bags. <br>
                                                                  The cleaner will update your bill after weighing your bag.</p>
                                                                  <div>
                                                                    <label><input type="radio" name="washandfold" value="none"> None </label>
                                                                    <label><input type="radio" name="washandfold" value="itemize"> Regular Laundry </label>
                                                                  </div>
                                                                  <div style="display:none;" class="none box"></div>
                                                                  <div style="display:none;" class="itemize box">

                                                                      <div class="form-group ">
                                                                          <label for="drycleaning_id">Please enter quantity</label><br>
                                                                          <table class="table">
                                                                            <tr><td class="">Regular Laundry (Clothes):</td><td><input  type="text" placeholder="lbs" name="q_Regular_Laundry" value=""></td>
                                                                            </tr>
                                                                            <tr><td class="">Bedding Comforter:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Comforter_laundry" value=""></td>
                                                                            <td class="">Bedding Blanket Throw:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Blanket_Throw" value=""></td>
                                                                                <td class="">Bedding Pillow:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Pillow_laundry" value=""></td>
                                                                            </tr>

                                                                            <tr>
                                                                              <td class="">Bedding Mattress Duvet Cover:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Mattress_Duvet_Cover" value=""></td>
                                                                              <td class="">Bath Mat:</td><td><input placeholder="Quantity" type="text" name="q_Bath_Mat_laundry" value=""></td>
                                                                              <td class="">Every Hang Dry Item:</td><td><input placeholder="Quantity" type="text" name="q_Every_Hang_Dry_Item" value=""></td>
                                                                            </tr>
                                                                          </table>
                                                                      </div>
                                                                  </div>
                                                                <ul class="list-inline pull-right">
                                                                    <li><button type="button" class="btn btn-default next-step">Next</button></li>
                                                                </ul>
                                                            </div>

                                                            <div class="tab-pane" role="tabpanel" id="step2">
                                                                <h3>Dry Cleaning</h3>
                                                                <p>Note: If you have both wash & fold and dry cleaning, please separate the two into different laundry bags. <br> The cleaner will update your bill after pickup</p>
                                                                <div>
                                                                  <label><input type="radio" name="dryclean" value="none"> None </label>
                                                                  <label><input type="radio" name="dryclean" value="itemize"> Itemize</label><br>
                                                                </div>
                                                                <div style="display:none;" class="none box"></div>

                                                                <div style="display:none;" class="itemize box">
                                                                  <div class="form-group ">
                                                                      <label for="drycleaning_id">Select Clothes Items</label><br>
                                                                      <table class="table">
                                                                        <tr><td class="">Sweater:</td><td><input placeholder="Quantity" type="text" name="q_Dress" value=""></td>
                                                                            <td class="">Shirt:</td><td><input placeholder="Quantity" type="text" name="q_Shirt" value=""></td>
                                                                            <td class="">Sweater:</td><td><input placeholder="Quantity" type="text" name="q_Sweater" value=""></td>
                                                                        </tr>

                                                                        <tr><td class="">Dress Childrens:</td><td><input placeholder="Quantity" type="text" name="q_Dress_Childrens" value=""></td>
                                                                            <td class="">Skirt:</td><td><input placeholder="Quantity" type="text" name="q_Skirt" value=""></td>
                                                                            <td class="">Tie:</td><td><input placeholder="Quantity" type="text" name="q_Tie" value=""></td></tr>

                                                                        <tr><td class="">Shorts:</td><td><input placeholder="Quantity" type="text" name="q_Shorts" value=""></td>
                                                                            <td class="">Jumpsuit:</td><td><input placeholder="Quantity" type="text" name="q_Jumpsuit" value=""></td>
                                                                            <td class="">Gown:</td><td><input placeholder="Quantity" type="text" name="q_Gown" value=""></td></tr>

                                                                        <tr><td class="">Mittens:</td><td><input placeholder="Quantity" type="text" name="q_Mittens" value=""></td>
                                                                            <td class="">Leggings:</td><td><input placeholder="Quantity" type="text" name="q_Leggings" value=""></td>
                                                                            <td class="">Bath Mat dry clean:</td><td><input placeholder="Quantity" type="text" name="q_Bath_Mat_dry_clean" value=""></td></tr>

                                                                            <tr><td class="">Jacket Down:</td><td><input placeholder="Quantity" type="text" name="q_Jacket_Down" value=""></td>
                                                                                <td class="">Nightgown:</td><td><input placeholder="Quantity" type="text" name="q_Nightgown" value=""></td>
                                                                                <td class="">Cummerbund:</td><td><input placeholder="Quantity" type="text" name="q_Cummerbund" value=""></td></tr>

                                                                                <tr><td class="">Bathing suit one piece:</td><td><input placeholder="Quantity" type="text" name="q_Bathing_suit_one_piece" value=""></td>
                                                                                    <td class="">Bathing suit Bottom:</td><td><input placeholder="Quantity" type="text" name="q_Bathing_suit_Bottom" value=""></td>
                                                                                    <td class="">Cardigan:</td><td><input placeholder="Quantity" type="text" name="q_Cardigan" value=""></td></tr>

                                                                              <tr><td class="">Tank Top:</td><td><input placeholder="Quantity" type="text" name="q_Tank_Top" value=""></td>
                                                                                  <td class="">Tablecloth:</td><td><input placeholder="Quantity" type="text" name="q_Tablecloth" value=""></td>
                                                                                  <td class="">Robe:</td><td><input placeholder="Quantity" type="text" name="q_Robe" value=""></td></tr>

                                                                                  <tr><td class="">Curtains Light:</td><td><input placeholder="Quantity" type="text" name="q_Curtains_Light" value=""></td>
                                                                                      <td class="">Coat Pea Coat:</td><td><input placeholder="Quantity" type="text" name="q_Coat_Pea_Coat" value=""></td>
                                                                                      <td class="">Coat Overcoat:</td><td><input placeholder="Quantity" type="text" name="q_Coat_Overcoat" value=""></td></tr>

                                                                                      <tr><td class="">2 Piece Suit:</td><td><input placeholder="Quantity" type="text" name="q_two_Piece_Suit" value=""></td>
                                                                                          <td class="">Romper:</td><td><input placeholder="Quantity" type="text" name="q_Romper" value=""></td>
                                                                                          <td class="">Cushion Cover:</td><td><input placeholder="Quantity" type="text" name="q_Cushion_Cover" value=""></td></tr>

                                                                                          <tr><td class="">Blouse:</td><td><input placeholder="Quantity" type="text" name="q_Blouse" value=""></td>
                                                                                              <td class="">Cocktail Dress:</td><td><input placeholder="Quantity" type="text" name="q_Cocktail_Dress" value=""></td>
                                                                                              <td class="">Pants:</td><td><input placeholder="Quantity" type="text" name="q_Pants" value=""></td></tr>


                                                                                              <tr><td class="">Jeans:</td><td><input placeholder="Quantity" type="text" name="q_Jeans" value=""></td>
                                                                                                  <td class="">Suit Jacket:</td><td><input placeholder="Quantity" type="text" name="q_Suit_Jacket" value=""></td>
                                                                                                  <td class="">Scarf:</td><td><input placeholder="Quantity" type="text" name="q_Scarf" value=""></td></tr>

                                                                                                  <tr><td class="">Polo Sport Shirt:</td><td><input placeholder="Quantity" type="text" name="q_Polo_Sport_Shirt" value=""></td>
                                                                                                      <td class="">Vest:</td><td><input placeholder="Quantity" type="text" name="q_Vest" value=""></td>
                                                                                                      <td class="">Gloves:</td><td><input placeholder="Quantity" type="text" name="q_Gloves" value=""></td></tr>

                                                                                                      <tr><td class="">Shawl:</td><td><input placeholder="Quantity" type="text" name="q_Shawl" value=""></td>
                                                                                                          <td class="">Napkins:</td><td><input placeholder="Quantity" type="text" name="q_Napkins" value=""></td>
                                                                                                          <td class="">Lab Coat:</td><td><input placeholder="Quantity" type="text" name="q_Lab_Coat" value=""></td></tr>

                                                                                                          <tr><td class="">Sweatshirt:</td><td><input placeholder="Quantity" type="text" name="q_Sweatshirt" value=""></td>
                                                                                                              <td class="">Overalls:</td><td><input placeholder="Quantity" type="text" name="q_Overalls" value=""></td>
                                                                                                              <td class="">Tuxedo:</td><td><input placeholder="Quantity" type="text" name="q_Tuxedo" value=""></td></tr>

                                                                                                              <tr><td class="">Jersey:</td><td><input placeholder="Quantity" type="text" name="q_Jersey" value=""></td>
                                                                                                                  <td class="">Hoodie:</td><td><input placeholder="Quantity" type="text" name="q_Hoodie" value=""></td>
                                                                                                                  <td class="">Bra:</td><td><input placeholder="Quantity" type="text" name="q_Bra" value=""></td></tr>

                                                                                                                  <tr><td class="">Belt:</td><td><input placeholder="Quantity" type="text" name="q_Belt" value=""></td>
                                                                                                                      <td class="">Jacket:</td><td><input placeholder="Quantity" type="text" name="q_Jacket" value=""></td>
                                                                                                                      <td class="">Coat:</td><td><input placeholder="Quantity" type="text" name="q_Coat" value=""></td></tr>

                                                                                                                      <tr><td class="">Coat 3/4 Coat:</td><td><input placeholder="Quantity" type="text" name="q_Coat_3_4_Coat" value=""></td>
                                                                                                                          <td class="">Coat Down:</td><td><input placeholder="Quantity" type="text" name="q_Coat_Down" value=""></td>
                                                                                                                          <td class="">2 Piece Skirt Suit:</td><td><input placeholder="Quantity" type="text" name="q_two_Piece_Skirt_Suit" value=""></td></tr>

                                                                                                                          <tr><td class="">Bedding Pillow Case:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Pillow_Case" value=""></td>
                                                                                                                              <td class="">Bedding Blanket:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Blanket" value=""></td>
                                                                                                                              <td class="">Bedding Bed Sheet:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Bed_Sheet" value=""></td></tr>

                                                                                                                              <tr><td class="">Bedding Pillow:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Pillow_dry_clean" value=""></td>
                                                                                                                                  <td class="">Bathing suit Top:</td><td><input placeholder="Quantity" type="text" name="q_Bathing_suit_Top" value=""></td>
                                                                                                                                  <td class="">Bedding Down Comforter:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Down_Comforter" value=""></td></tr>

                                                                                                                                  <tr><td class="">Bedding Comforter:</td><td><input placeholder="Quantity" type="text" name="q_Bedding_Comforter_dry_clean" value=""></td>
                                                                                                                                      </tr>
                                                                                                                                    </table>
                                                                  </div>
                                                                </div>
                                                                <br>
                                                                <ul class="list-inline pull-right">
                                                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                    <li><button type="button" class="btn btn-default next-step">Next</button></li>
                                                                </ul>
                                                              </div>

                                                              <div class="tab-pane " role="tabpanel" id="step3">

                                                                <h3>Tailoring Services</h3>
                                                                <div>
                                                                  <label><input type="radio" name="tailoring" value="none"> None </label>
                                                                  <label><input type="radio" name="tailoring" value="itemize"> Itemize</label><br>
                                                                </div>
                                                                <div style=" display:none;" class="none box"></div>
                                                                <div style=" display:none;" class="itemize box">
                                                                <div class="form-group ">
                                                                    <label for="tailoring_id">Select Tailoring Services</label><br>
                                                                    <table class="table">
                                                                      <tr><td class="">Hemming:</td><td><input placeholder="Quantity" type="text" name="q_Hemming" value=""></td>
                                                                          <td class="">Hemming_Pant:</td><td><input placeholder="Quantity" type="text" name="q_Hemming_Pant" value=""></td>
                                                                          <td class="">Hemming_Sleeve:</td><td><input placeholder="Quantity" type="text" name="q_Hemming_Sleeve" value=""></td>
                                                                      </tr>
                                                                      <tr><td class="">Taper:</td><td><input placeholder="Quantity" type="text" name="q_Taper" value=""></td>
                                                                          <td class="">Button:</td><td><input placeholder="Quantity" type="text" name="q_Button" value=""></td>
                                                                          <td class="">Patch:</td><td><input placeholder="Quantity" type="text" name="q_Patch" value=""></td>
                                                                      </tr>
                                                                      <tr><td class="">Zipper:</td><td><input placeholder="Quantity" type="text" name="q_Zipper" value=""></td>
                                                                      </tr>

                                                                    </table>
                                                                </div>
                                                              </div>
                                                              <br>
                                                              <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li><button type="button" class="btn btn-default next-step">Next</button></li>
                                                              </ul>
                                                            </div>

                                                              <div class="tab-pane " role="tabpanel" id="complete">
                                                                <h1>Select Date</h1>

                                                                  <div class="col-md-12">
                                                                    <!--subscribe border box start-->
                                                                      <div class="subscribe-box gray-bg round-5 m-bot-20">

                                                                          <div class="subscribe-info">
                                                                            <h4>Schedule your next Pickup</h4>
                                                                          </div>

                                                                          <div class="subscribe-form">
                                                                            <div class="form-group">

                                                                              <input type="text" name="dos"  value="select date" placeholder="Select date" id="datepicker" class="datepicker form-control" readonly="readonly">

                                                                            </div>
                                                                          </div>
                                                                      <!--subscribe border box end-->
                                                                    </div>
                                                                  
                                                                  <br>
                                                                <ul class="list-inline pull-right">
                                                                  <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                </ul>
                                                              </div>


                                                          </div>
                                                      </div>
                                                  </section>
                                                  <!--tabs border end-->
                                                </div>
                                                </div>
                                              </div>
                                          </div>
                                      </div>

                                    </dd>

                                    <dt>
                                          <a href="">Use Gift Voucher</a>
                                    </dt>

                                    <dd>
                                          <div class="form-inline coupon-form">
                                              <div class="form-group">
                                                  <label>Enter Your Gift Voucher</label>
                                                  <input type="text" name="voucher" class="form-control width-300" ></input>
                                              </div>
                                          </div>

                                    </dd>

                              <div class="cart-btn-row inline-block">
                                <button type="submit" class="btn btn-medium btn-dark-solid pull-right" name="button"><i class="fa fa-shopping-cart"></i>Place Request</button>

                                  <!-- <a href="#" class="btn btn-medium btn-dark-solid btn-transparent  pull-right">  Continue Shopping </a> -->
                              </div>
  </form>


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
                        <p>Massive is  fully responsible, performance oriented and SEO optimized, retina ready WordPress theme.</p>

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
                            <li>
                                <a href="#"><img src="img/recent-work/9.jpg" alt=""/></a>
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
                        <span class="m-top-10">Copyright 2012 - 2015 Massive Theme by <a href="http://themebucket.net/" class="f-link" target="_blank">ThemeBucket</a> | All Rights Reserved</span>
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
