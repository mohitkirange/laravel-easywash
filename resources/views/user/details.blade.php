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
                        <!-- <div class="col-md-6 ">
                            <div class="banner-title m-top-0">
                                <h1 class="text-uppercase">About us </h1>
                            </div>
                        </div> -->
                    </div>
                    @endforeach
                </div>
            </section>


                        @if ( count( $errors ) > 0 )
                             @foreach ($errors->all() as $error)
                            <p class="alert alert-danger " >
                                        {{ $error }}
                            </p>
                            @endforeach
                          @endif




            <!--body content start-->
            <section class="body-content ">
                <div class="page-content">
                    <div class="container">
                      <!-- Row start here -->
                        @foreach($services as $service)
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="post-list-aside">
                                            <div class="post-single">
                                                <div class="post-slider-thumb post-img text-center">
                                                    <ul class="slides">
                                                      <li data-thumb="{{$service->featured}}">
                                                          <a href="javascript:;" title="Freshness Photo"><img src="{{$service->featured}}" alt=""/></a>
                                                      </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-title">
                                            <h2 class="text-uppercase">{{$service->name}}</h2>
                                        </div>

                                        <div class="product-price txt-xl">
                                            <span class="border-tb p-tb-10">{{$service->address}}, {{$service->city}} ,{{$service->state}},{{$service->zipcode}}</span>
                                        </div>
                                        <div class="col-md-4">
                                          <ul class="portfolio-meta m-bot-10 m-top-10 stock">
                                            <li><span> Provided Services: </span><br> @foreach( $categories as $category )
                                              {{$category->name}}<br>
                                              <!-- &nbsp|&nbsp -->
                                              @endforeach
                                            </li>
                                          </ul>
                                        </div>

                                        <div class="col-md-4">
                                          <ul class="portfolio-meta m-bot-10 m-top-10 stock">
                                            <li><span> Working Days: </span><br>
                                               @foreach( $workingdays as $workingday )
                                                {{$workingday->name}}<br>
                                                @endforeach
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="col-md-8">
                                        <ul class="portfolio-meta m-bot-10 m-top-10 stock">
                                          <li>
                                          <span><span class="">Average Rating:</span></span>
                                            @for ($i=1; $i <= 5 ; $i++)
                                              <p class="fa fa-star{{ ($i <= $avg_rating) ? '' : '-o'}}"></p>
                                            @endfor
                                            (<b>{{$avg_rating}}</b>  /&nbsp5 )
                                          </li>
                                        </ul>
                                        </div>

                                        <div class="clearfix">
                                            <a href="{{ route('user.cart', ['id' => $service->sp_id , 'service_id' => $service->id] )}}" class="btn btn-medium btn-dark-solid  "><i class="fa fa-shopping-cart"></i> Request a Service</a>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                      <!-- Row ends here -->


                    <!-- next row start -->
                        <div class="row page-content">
                            <div class="col-md-12">
                                <!--tabs border start-->
                                <section class="normal-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab-one">More Info</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab-two">Price Table</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab-three">Review ( {{$comments->count()}} )</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab-four">Contact</a>
                                        </li>

                                    </ul>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div id="tab-one" class="tab-pane active">
                                                <h4 class="text-uppercase">Additional Information</h4>
                                                  {{$service->content}}
                                            </div>

                                            <div id="tab-two" class="tab-pane">
                                              @foreach($prices as $price)
                                                <table class="table table-striped table-bordered">
                                                  <thead><h4>Laundry</h4></thead>
                                                  <tbody>
                                                      <tr>
                                                      <td>Service</td>
                                                      <td>Price ($)</td>
                                                      </tr>
                                                      <tr><td>Regular_Laundry    </td><td>{{$price->  Regular_Laundry}}</td></tr>
                                                      <tr><td>Bedding_Mattress_Duvet_Cover    </td><td>{{$price->  Bedding_Mattress_Duvet_Cover}}</td></tr>
                                                      <tr><td>Bedding_Comforter_laundry    </td><td>{{$price->  Bedding_Comforter_laundry}}</td></tr>
                                                      <tr><td>Bedding_Blanket_Throw    </td><td>{{$price->  Bedding_Blanket_Throw}}</td></tr>
                                                      <tr><td>Bedding_Pillow_laundry    </td><td>{{$price->  Bedding_Pillow_laundry}}</td></tr>
                                                      <tr><td>Bath_Mat_laundry    </td><td>{{$price->  Bath_Mat_laundry}}</td></tr>
                                                      <tr><td>Every_Hang_Dry_Item    </td><td>{{$price->  Every_Hang_Dry_Item}}</td></tr>

                                                  </tbody>
                                                </table>
                                                <table class="table table-striped table-bordered">
                                                    <thead><h4>Dry Cleaning</h4></thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>Service</td>
                                                    <td>Price ($)</td>
                                                    </tr>
                                                    <tr><td>Dress</td><td>{{$price->Dress}}</td></tr>
                                                    <tr><td>Shirt</td><td>{{$price->Shirt}}</td></tr>
                                                    <tr><td>Sweater</td><td>{{$price->Sweater}}</td></tr>
                                                    <tr><td>Dress_Childrens</td><td>{{$price->Dress_Childrens}}</td></tr>
                                                    <tr><td>Skirt</td><td>{{$price->Skirt}}</td></tr>
                                                    <tr><td>Tie</td><td>{{$price->Tie}}</td></tr>
                                                    <tr><td>Shorts</td><td>{{$price->Shorts}}</td></tr>
                                                    <tr><td>Jumpsuit</td><td>{{$price->Jumpsuit}}</td></tr>
                                                    <tr><td>Gown</td><td>{{$price->Gown}}</td></tr>
                                                    <tr><td>Mittens</td><td>{{$price->Mittens}}</td></tr>
                                                    <tr><td>Leggings</td><td>{{$price->Leggings}}</td></tr>
                                                    <tr><td>Bath_Mat_dry_clean</td><td>{{$price->Bath_Mat_dry_clean}}</td></tr>
                                                    <tr><td>Jacket_Down</td><td>{{$price->Jacket_Down}}</td></tr>
                                                    <tr><td>Nightgown</td><td>{{$price->Nightgown}}</td></tr>
                                                    <tr><td>Cummerbund</td><td>{{$price->Cummerbund}}</td></tr>
                                                    <tr><td>Bathing_suit_one_piece</td><td>{{$price->Bathing_suit_one_piece}}</td></tr>
                                                    <tr><td>Bathing_suit_Bottom</td><td>{{$price->Bathing_suit_Bottom}}</td></tr>
                                                    <tr><td>Cardigan</td><td>{{$price->Cardigan}}</td></tr>
                                                    <tr><td>Tank_Top</td><td>{{$price->Tank_Top}}</td></tr>
                                                    <tr><td>Tablecloth</td><td>{{$price->Tablecloth}}</td></tr>
                                                    <tr><td>Robe</td><td>{{$price->Robe}}</td></tr>
                                                    <tr><td>Curtains_Light</td><td>{{$price->Curtains_Light}}</td></tr>
                                                    <tr><td>Coat_Pea_Coat</td><td>{{$price->Coat_Pea_Coat}}</td></tr>
                                                    <tr><td>Coat_Overcoat</td><td>{{$price->Coat_Overcoat}}</td></tr>
                                                    <tr><td>two_Piece_Suit</td><td>{{$price->two_Piece_Suit}}</td></tr>
                                                    <tr><td>Romper</td><td>{{$price->Romper}}</td></tr>
                                                    <tr><td>Cushion_Cover</td><td>{{$price->Cushion_Cover}}</td></tr>
                                                    <tr><td>Blouse</td><td>{{$price->Blouse}}</td></tr>
                                                    <tr><td>Cocktail_Dress</td><td>{{$price->Cocktail_Dress}}</td></tr>
                                                    <tr><td>Pants</td><td>{{$price->Pants}}</td></tr>
                                                    <tr><td>Jeans</td><td>{{$price->Jeans}}</td></tr>
                                                    <tr><td>Suit_Jacket</td><td>{{$price->Suit_Jacket}}</td></tr>
                                                    <tr><td>Scarf</td><td>{{$price->Scarf}}</td></tr>
                                                    <tr><td>Polo_Sport_Shirt</td><td>{{$price->Polo_Sport_Shirt}}</td></tr>
                                                    <tr><td>Vest</td><td>{{$price->Vest}}</td></tr>
                                                    <tr><td>Gloves</td><td>{{$price->Gloves}}</td></tr>
                                                    <tr><td>Shawl</td><td>{{$price->Shawl}}</td></tr>
                                                    <tr><td>Napkins</td><td>{{$price->Napkins}}</td></tr>
                                                    <tr><td>Lab_Coat</td><td>{{$price->Lab_Coat}}</td></tr>
                                                    <tr><td>Sweatshirt</td><td>{{$price->Sweatshirt}}</td></tr>
                                                    <tr><td>Overalls</td><td>{{$price->Overalls}}</td></tr>
                                                    <tr><td>Tuxedo</td><td>{{$price->Tuxedo}}</td></tr>
                                                    <tr><td>Jersey</td><td>{{$price->Jersey}}</td></tr>
                                                    <tr><td>Hoodie</td><td>{{$price->Hoodie}}</td></tr>
                                                    <tr><td>Bra</td><td>{{$price->Bra}}</td></tr>
                                                    <tr><td>Belt</td><td>{{$price->Belt}}</td></tr>
                                                    <tr><td>Jacket</td><td>{{$price->Jacket}}</td></tr>
                                                    <tr><td>Coat</td><td>{{$price->Coat}}</td></tr>
                                                    <tr><td>Coat_3_4_Coat</td><td>{{$price->Coat_3_4_Coat}}</td></tr>
                                                    <tr><td>Coat_Down</td><td>{{$price->Coat_Down}}</td></tr>
                                                    <tr><td>two_Piece_Skirt_Suit</td><td>{{$price->two_Piece_Skirt_Suit}}</td></tr>
                                                    <tr><td>Bedding_Pillow_Case</td><td>{{$price->Bedding_Pillow_Case}}</td></tr>
                                                    <tr><td>Bedding_Blanket</td><td>{{$price->Bedding_Blanket}}</td></tr>
                                                    <tr><td>Bedding_Bed_Sheet</td><td>{{$price->Bedding_Bed_Sheet}}</td></tr>
                                                    <tr><td>Bedding_Pillow_dry_clean</td><td>{{$price->Bedding_Pillow_dry_clean}}</td></tr>
                                                    <tr><td>Bathing_suit_Top</td><td>{{$price->Bathing_suit_Top}}</td></tr>
                                                    <tr><td>Bedding_Down_Comforter</td><td>{{$price->Bedding_Down_Comforter}}</td></tr>
                                                    <tr><td>Bedding_Comforter_dry_clean</td><td>{{$price->Bedding_Comforter_dry_clean}}</td></tr>
                                                  </tbody>
                                                </table>
                                                <table class="table table-striped table-bordered">
                                                  <thead><h4>Tailoring</h4></thead>
                                                  <tbody>
                                                  <tr>
                                                  <td>Service</td>
                                                  <td>Price ($)</td>
                                                  </tr>
                                                <tr><td>Hemming</td><td>{{$price->  Hemming}}</td></tr>
                                                <tr><td>Hemming_Pant</td><td>{{$price->  Hemming_Pant}}</td></tr>
                                                <tr><td>Hemming_Sleeve</td><td>{{$price->  Hemming_Sleeve}}</td></tr>
                                                <tr><td>Taper</td><td>{{$price->  Taper}}</td></tr>
                                                <tr><td>Button</td><td>{{$price->  Button}}</td></tr>
                                                <tr><td>Patch</td><td>{{$price->  Patch}}</td></tr>
                                                <tr><td>Zipper</td><td>{{$price->  Zipper}}</td></tr>
                                                </tbody>
                                          </table>
                                                @endforeach
                                            </div>

                                            <div id="tab-three" class="tab-pane">
                                                <ul class="media-list comments-list clearlist">

                                                    <!-- comment item start-->
                                                    @if($comments->count()>0)
                                                  @foreach($comments as $comment)

                                                    <li class="media">
                                                        <a class="pull-left" href="#"><img class="media-object review-avatar" src="{{asset('app/img/post/a1.png')}}" alt=""></a>
                                                        <div class="media-body">
                                                            <div class="comment-info">
                                                                <div class="reviewer text-uppercase">
                                                                    <a href="#">{{$comment->user_name}}</a>
                                                                </div>
                                                                {{$comment->created_at}}
                                                                  <hr>
                                                                 <span class="review-rating">
                                                                   @for ($i=1; $i <= 5 ; $i++)
                                                                     <span class="fa fa-star{{ ($i <= $comment->rating) ? '' : '-o'}}"></span>
                                                                   @endfor
                                                                </span>
                                                            </div>

                                                            <p>
                                                                {{$comment->comment}}
                                                            </p>
                                                        </div>
                                                    </li>
                                                    @endforeach

                                                    @else
                                                      <tr>
                                                        <th colspan="5" class="text-center">No Published reviews</th>
                                                      </tr>
                                                    @endif
                                                    <!-- comment item end -->

                                                    <!-- comment item -->

                                                    <!-- comment item end -->

                                                </ul>

                                                <!--add Comment start-->
                                                <div class="heading-title-alt text-left heading-border-bottom">
                                                    <h4 class="text-uppercase">ADD REVIEW</h4>
                                                </div>

                                                <form method="post" name="comment" action="{{ route('user.home.details.comment', ['id' => $service->sp_id , 'service_id' => $service->id] )}}" id="form" role="form" class="blog-comments">
                                                  {{ csrf_field()}}
                                                    <div class="row">

                                                        <div class="col-md-6 form-group">


                                                        <div class="form-group col-md-12">
                                                            <select class="form-control" name="rating">
                                                                <option value="">Rating -- Select One --</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>

                                                        <!-- Comment -->
                                                        <div class="form-group col-md-12" >


                                                          <textarea name="comment" id="comment" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                                                        </div>

                                                        <!-- Send Button -->
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn btn-small btn-dark-solid ">
                                                                Submit Review
                                                            </button>
                                                        </div>


                                                    </div>

                                                </form>
                                                <!--add review end-->

                                              </div>
                                            </div>

                                            <div id="tab-four" class="tab-pane">
                                              <div class="col-md-8">

                                                  <h4 class="text-uppercase">have you a question?</h4>
                                                  <!-- <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus. Nam libero tempore</p> -->

                                                  <form method="post" action="{{ route('user.home.details.contact', ['id' => $service->sp_id , 'service_id' => $service->id] )}}" id="form" role="form" class="contact-comments m-top-50">
                                                    {{ csrf_field() }}
                                                      <div class="row">

                                                          <div class="col-md-6 form-group">
                                                              <!-- Name -->
                                                              <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required="">
                                                          </div>

                                                          <div class="col-md-6 form-group">
                                                              <!-- Email -->
                                                              <input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required="">
                                                          </div>


                                                          <div class="form-group col-md-6">
                                                              <!-- Phone -->
                                                              <input type="text" name="phone" id="phone" class=" form-control" placeholder="Phone" maxlength="100">
                                                          </div>

                                                          <div class="form-group col-md-6">
                                                              <!-- Subject -->
                                                              <input type="text" name="subject" id="subject" class=" form-control" placeholder="Subject" maxlength="100">
                                                          </div>

                                                          <!-- Comment -->
                                                          <div class="form-group col-md-12">
                                                              <textarea name="message" id="text" class="cmnt-text form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                                                          </div>

                                                          <!-- Send Button -->
                                                          <div class="form-group col-md-12">
                                                              <button type="submit" class="btn btn-small btn-dark-solid ">
                                                                  Send Message
                                                              </button>
                                                          </div>


                                                      </div>

                                                  </form>
                                              </div>


                                            </div>
                                        </div>
                                </section>
                                <!--tabs border end-->
                            </div>
                        </div>
                        </div>
                        <!-- next row ends -->
  </div>
                </div>
            </section>
            <!--body content end-->

        @include('user.footer.footer')

        </div>


    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- Placed js at the end of the document so the pages load faster -->



    <!-- <script src=" {{ asset('app/js/jquery-1.10.2.min.js') }}"></script> -->
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
    <!--common scripts-->
    <script src=" {{ asset('app/js/scripts.js') }}"></script>


    <script src=" {{ asset('app/js/jquery-ui.js') }}"></script>
<script>

    $( "#datepicker" ).datepicker({
    	inline: true,
      minDate:0,
    });


</script>


    </body>
    </html>
  @endsection
