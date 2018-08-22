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

    <!--body content start-->
    <section class="body-content ">
      @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="page-content">
            <div class="container">
                <div class="row">

                  <!-- INFO  -->
                  <div class="col-md-12">


                              <!-- accordion 2 start-->
                              <dl class="accordion">
                                <dt> <a href="#">Service Provider Details</a> </dt>
                                <dd>
                                  @foreach( $services as $service )
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
                                                  @for ($i=1; $i <= 5 ; $i++)
                                                    <p class="fa fa-star{{ ($i <= $avg_rating) ? '' : '-o'}}"></p>
                                                  @endfor
                                                  (<strong class="number-item">{{$avg_rating}}</strong>  /&nbsp5)
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
                                                  <li><span> Working Days: </span><br>   @foreach( $workingdays as $workingday )
                                                      {{$workingday->name}}<br>
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

                                <dt><a href="#">Order Status</a></dt>


                                <dd>
                                  <p class="text-uppercase"><b>Order status:</b>@if ($status === null)
                                    Pending
                                  @else
                                    {{$status->status}}
                                  @endif
                                </p>
                                  <div class="row">
                                      <div class="col-md-8 col-md-offset-2">
                                        <div class="progress">
                                          @if ($status === null)
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                            Pending</div>
                                          @elseif ( ($status->status) == "Accepted")
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="14.28" aria-valuemin="0" aria-valuemax="100" style="width:14.28%">
                                            Accepted</div>

                                          @elseif ( ($status->status) == "Out for pickup" )
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="28.57" aria-valuemin="0" aria-valuemax="100" style="width:28.57%">
                                            Out for pickup</div>

                                          @elseif ( ($status->status) == "Picked up")
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="42.85" aria-valuemin="0" aria-valuemax="100" style="width:42.85%">
                                            Picked up</div>

                                          @elseif ( ($status->status) == "In store - Cleaning" )
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="57.14" aria-valuemin="0" aria-valuemax="100" style="width:57.14%">
                                            In store - Cleaning</div>

                                          @elseif ( ($status->status) == "Out for delivery")
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="71.42" aria-valuemin="0" aria-valuemax="100" style="width:71.42%">
                                            Out for delivery</div>

                                          @elseif ( ($status->status) == "Delivered" )
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="85.71" aria-valuemin="0" aria-valuemax="100" style="width:85.71%">
                                            Delivered</div>

                                          @elseif ( ($status->status) == "Completed")
                                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                            Completed</div>

                                          @else

                                          @endif


                                        </div>
                                        </div>
                                  </div>
                                </dd>

                                <dt><a href="#">Order Date</a></dt>
                                <dd>
                                  <p class="text-uppercase"><b>Service requested on:</b>
                                    @foreach($carts as $carts)
                                     {{$carts->dos}}
                                     @endforeach
                                   </p>
                                </dd>
                                <dt><a href="">Order Details</a></dt>
                                    <dd>
                                      @foreach($prices as $price)

                                          <p class="text-uppercase"><b>Wash and fold</b></p>

                                          @if ( $carts->washandfold == "none")
                                            No Wash and fold service requested
                                          @else
                                            <table class="table table-hover">
                                              <thead >
                                                  <tr class="active">
                                                    <th class="">Quantity</th>
                                                    <th class="">Times</th>
                                                    <th class="">Price ($)</th>
                                                    <th class="">Total</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @if (is_null($carts->q_Regular_Laundry))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Regular_Laundry}} pounds. Regular Laundry</th>
                                                    <td>X</td>
                                                    <td>{{$price->Regular_Laundry}}</td>
                                                    <td>
                                                      @php
                                                      $a1= $carts->q_Regular_Laundry;
                                                      $b1 =$price->Regular_Laundry;
                                                      $waf1= $a1*$b1;
                                                      @endphp
                                                      {{$waf1}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Mattress_Duvet_Cover))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Mattress_Duvet_Cover}} Bedding Mattress Duvet Cover</th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Mattress_Duvet_Cover}}</td>
                                                    <td>
                                                      @php
                                                      $a2= $carts->q_Bedding_Mattress_Duvet_Cover;
                                                      $b2 =$price->Bedding_Mattress_Duvet_Cover;
                                                      $waf2= $a2*$b2;
                                                      @endphp
                                                      {{$waf2}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Comforter_laundry))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Comforter_laundry}} Bedding Comforter</th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Comforter_laundry}}</td>
                                                    <td>
                                                      @php
                                                      $a3= $carts->q_Bedding_Comforter_laundry;
                                                      $b3 =$price->Bedding_Comforter_laundry;
                                                      $waf3= $a3*$b3;
                                                      @endphp
                                                      {{$waf3}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Blanket_Throw))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Blanket_Throw}} Bedding Blanket Throw</th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Blanket_Throw}}</td>
                                                    <td>
                                                      @php
                                                      $a4= $carts->q_Bedding_Blanket_Throw;
                                                      $b4 =$price->Bedding_Blanket_Throw;
                                                      $waf4= $a4*$b4;
                                                      @endphp
                                                      {{$waf4}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Pillow_laundry))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Pillow_laundry}} Bedding Pillow</th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Pillow_laundry}}</td>
                                                    <td>
                                                      @php
                                                      $a5= $carts->q_Bedding_Pillow_laundry;
                                                      $b5 =$price->Bedding_Pillow_laundry;
                                                      $waf5= $a5*$b5;
                                                      @endphp
                                                      {{$waf5}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bath_Mat_laundry))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bath_Mat_laundry}} Bath Mat</th>
                                                    <td>X</td>
                                                    <td>{{$price->Bath_Mat_laundry}}</td>
                                                    <td>
                                                      @php
                                                      $a6= $carts->q_Bath_Mat_laundry;
                                                      $b6 =$price->Bath_Mat_laundry;
                                                      $waf6= $a6*$b6;
                                                      @endphp
                                                      {{$waf6}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Every_Hang_Dry_Item))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Every_Hang_Dry_Item}} Hang Dry Items</th>
                                                    <td>X</td>
                                                    <td>{{$price->Every_Hang_Dry_Item}}</td>
                                                    <td>
                                                      @php
                                                      $a7= $carts->q_Every_Hang_Dry_Item;
                                                      $b7 =$price->Every_Hang_Dry_Item;
                                                      $waf7= $a7*$b7;
                                                      @endphp
                                                      {{$waf7}}
                                                    </td>
                                                </tr>
                                                @endif

                                              </tbody>
                                          </table>
                                          @endif

                                          <p class="text-uppercase"><b>Dry Cleaning</b></p>
                                          @if ( $carts->dryclean == "none")
                                            No dry cleaning service requested
                                          @else
                                            <table class="table table-hover">
                                              <thead>
                                                  <tr class="active">
                                                    <th class="">Quantity</th>
                                                    <th class="">Times</th>
                                                    <th class="">Price ($)</th>
                                                    <th class="">Total</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @if (is_null($carts->q_Dress))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Dress}} Dress </th>
                                                    <td>X</td>
                                                    <td>{{$price->Dress}}</td>
                                                    <td>
                                                      @php
                                                      $a1= $carts->q_Dress;
                                                      $b1 =$price->Dress;
                                                      $dc1= $a1*$b1;
                                                      @endphp
                                                      {{$dc1}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Shirt))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Shirt}} Shirt</th>
                                                    <td>X</td>
                                                    <td>{{$price->Shirt}}</td>
                                                    <td>
                                                      @php
                                                      $a2= $carts->q_Shirt;
                                                      $b2 =$price->Shirt;
                                                      $dc2= $a2*$b2;
                                                      @endphp
                                                      {{$dc2}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Sweater))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Sweater}} Sweater</th>
                                                    <td>X</td>
                                                    <td>{{$price->Sweater}}</td>
                                                    <td>
                                                      @php
                                                      $a3= $carts->q_Sweater;
                                                      $b3 =$price->Sweater;
                                                      $dc3= $a3*$b3;
                                                      @endphp
                                                      {{$dc3}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Dress_Childrens))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Dress_Childrens}} Dress_Childrens</th>
                                                    <td>X</td>
                                                    <td>{{$price->Dress_Childrens}}</td>
                                                    <td>
                                                      @php
                                                      $a4= $carts->q_Dress_Childrens;
                                                      $b4 =$price->Dress_Childrens;
                                                      $dc4= $a4*$b4;
                                                      @endphp
                                                      {{$dc4}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Skirt))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Skirt}} Skirt</th>
                                                    <td>X</td>
                                                    <td>{{$price->Skirt}}</td>
                                                    <td>
                                                      @php
                                                      $a5= $carts->q_Skirt;
                                                      $b5 =$price->Skirt;
                                                      $dc5= $a5*$b5;
                                                      @endphp
                                                      {{$dc5}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Tie))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Tie}} Tie</th>
                                                    <td>X</td>
                                                    <td>{{$price->Tie}}</td>
                                                    <td>
                                                      @php
                                                      $a6= $carts->q_Tie;
                                                      $b6 =$price->Tie;
                                                      $dc6= $a6*$b6;
                                                      @endphp
                                                      {{$dc6}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Shorts))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Shorts}} Shorts </th>
                                                    <td>X</td>
                                                    <td>{{$price->Shorts}}</td>
                                                    <td>
                                                      @php
                                                      $a7= $carts->q_Shorts;
                                                      $b7 =$price->Shorts;
                                                      $dc7= $a7*$b7;
                                                      @endphp
                                                      {{$dc7}}
                                                    </td>
                                                </tr>
                                                @endif

                                                @if (is_null($carts->q_Jumpsuit))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Jumpsuit}} Jumpsuit </th>
                                                    <td>X</td>
                                                    <td>{{$price->Jumpsuit}}</td>
                                                    <td>
                                                      @php
                                                      $a8= $carts->q_Jumpsuit;
                                                      $b8 =$price->Jumpsuit;
                                                      $dc8= $a8*$b8;
                                                      @endphp
                                                      {{$dc8}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Gown))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Gown}} Gown </th>
                                                    <td>X</td>
                                                    <td>{{$price->Gown}}</td>
                                                    <td>
                                                      @php
                                                      $a9= $carts->q_Gown;
                                                      $b9 =$price->Gown;
                                                      $dc9= $a9*$b9;
                                                      @endphp
                                                      {{$dc9}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Mittens))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Mittens}} Mittens </th>
                                                    <td>X</td>
                                                    <td>{{$price->Mittens}}</td>
                                                    <td>
                                                      @php
                                                      $a10= $carts->q_Mittens;
                                                      $b10 =$price->Mittens;
                                                      $dc10= $a10*$b10;
                                                      @endphp
                                                      {{$dc10}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Leggings))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Leggings}} Leggings </th>
                                                    <td>X</td>
                                                    <td>{{$price->Leggings}}</td>
                                                    <td>
                                                      @php
                                                      $a11= $carts->q_Leggings;
                                                      $b11 =$price->Leggings;
                                                      $dc11= $a11*$b11;
                                                      @endphp
                                                      {{$dc11}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bath_Mat_dry_clean))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bath_Mat_dry_clean}} Bath Mat </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bath_Mat_dry_clean}}</td>
                                                    <td>
                                                      @php
                                                      $a12= $carts->q_Bath_Mat_dry_clean;
                                                      $b12 =$price->Bath_Mat_dry_clean;
                                                      $dc12= $a12*$b12;
                                                      @endphp
                                                      {{$dc12}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Jacket_Down))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Jacket_Down}} Jacket Down </th>
                                                    <td>X</td>
                                                    <td>{{$price->Jacket_Down}}</td>
                                                    <td>
                                                      @php
                                                      $a13= $carts->q_Jacket_Down;
                                                      $b13 =$price->Jacket_Down;
                                                      $dc13= $a13*$b13;
                                                      @endphp
                                                      {{$dc13}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Nightgown))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Nightgown}}  Nightgown </th>
                                                    <td>X</td>
                                                    <td>{{$price->Nightgown}}</td>
                                                    <td>
                                                      @php
                                                      $a14= $carts->q_Nightgown;
                                                      $b14 =$price->Nightgown;
                                                      $dc14= $a14*$b14;
                                                      @endphp
                                                      {{$dc14}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Cummerbund))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Cummerbund}} Cummerbund </th>
                                                    <td>X</td>
                                                    <td>{{$price->Cummerbund}}</td>
                                                    <td>
                                                      @php
                                                      $a15= $carts->q_Cummerbund;
                                                      $b15 =$price->Cummerbund;
                                                      $dc15= $a15*$b15;
                                                      @endphp
                                                      {{$dc15}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bathing_suit_one_piece))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bathing_suit_one_piece}} Bathing suit 1 piece </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bathing_suit_one_piece}}</td>
                                                    <td>
                                                      @php
                                                      $a16= $carts->q_Bathing_suit_one_piece;
                                                      $b16 =$price->Bathing_suit_one_piece;
                                                      $dc16= $a16*$b16;
                                                      @endphp
                                                      {{$dc16}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bathing_suit_Bottom))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bathing_suit_Bottom}} Bathing suit Bottom </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bathing_suit_Bottom}}</td>
                                                    <td>
                                                      @php
                                                      $a17= $carts->q_Bathing_suit_Bottom;
                                                      $b17 =$price->Bathing_suit_Bottom;
                                                      $dc17= $a17*$b17;
                                                      @endphp
                                                      {{$dc17}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Cardigan))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Cardigan}} Cardigan </th>
                                                    <td>X</td>
                                                    <td>{{$price->Cardigan}}</td>
                                                    <td>
                                                      @php
                                                      $a18= $carts->q_Cardigan;
                                                      $b18 =$price->Cardigan;
                                                      $dc18= $a18*$b18;
                                                      @endphp
                                                      {{$dc18}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Tank_Top))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Tank_Top}}  Tank Top </th>
                                                    <td>X</td>
                                                    <td>{{$price->Tank_Top}}</td>
                                                    <td>
                                                      @php
                                                      $a19= $carts->q_Tank_Top;
                                                      $b19 =$price->Tank_Top;
                                                      $dc19= $a19*$b19;
                                                      @endphp
                                                      {{$dc19}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Shorts))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Tablecloth}} Tablecloth </th>
                                                    <td>X</td>
                                                    <td>{{$price->Tablecloth}}</td>
                                                    <td>
                                                      @php
                                                      $a20= $carts->q_Tablecloth;
                                                      $b20 =$price->Tablecloth;
                                                      $dc20= $a20*$b20;
                                                      @endphp
                                                      {{$dc20}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Robe))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Robe}} Robe </th>
                                                    <td>X</td>
                                                    <td>{{$price->Robe}}</td>
                                                    <td>
                                                      @php
                                                      $a21= $carts->q_Robe;
                                                      $b21 =$price->Robe;
                                                      $dc21= $a21*$b21;
                                                      @endphp
                                                      {{$dc21}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Curtains_Light))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Curtains_Light}} Curtains Light </th>
                                                    <td>X</td>
                                                    <td>{{$price->Curtains_Light}}</td>
                                                    <td>
                                                      @php
                                                      $a22= $carts->q_Curtains_Light;
                                                      $b22 =$price->Curtains_Light;
                                                      $dc22= $a22*$b22;
                                                      @endphp
                                                      {{$dc22}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Coat_Pea_Coat))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Coat_Pea_Coat}} Coat Pea Coat </th>
                                                    <td>X</td>
                                                    <td>{{$price->Coat_Pea_Coat}}</td>
                                                    <td>
                                                      @php
                                                      $a23= $carts->q_Coat_Pea_Coat;
                                                      $b23 =$price->Coat_Pea_Coat;
                                                      $dc23= $a23*$b23;
                                                      @endphp
                                                      {{$dc23}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Coat_Overcoat))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Coat_Overcoat}} Coat Overcoat </th>
                                                    <td>X</td>
                                                    <td>{{$price->Coat_Overcoat}}</td>
                                                    <td>
                                                      @php
                                                      $a24= $carts->q_Coat_Overcoat;
                                                      $b24 =$price->Coat_Overcoat;
                                                      $dc24= $a24*$b24;
                                                      @endphp
                                                      {{$dc24}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_two_Piece_Suit))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_two_Piece_Suit}} 2 Piece Suit </th>
                                                    <td>X</td>
                                                    <td>{{$price->two_Piece_Suit}}</td>
                                                    <td>
                                                      @php
                                                      $a25= $carts->q_two_Piece_Suit;
                                                      $b25 =$price->two_Piece_Suit;
                                                      $dc25= $a25*$b25;
                                                      @endphp
                                                      {{$dc25}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Romper))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Romper}} Romper </th>
                                                    <td>X</td>
                                                    <td>{{$price->Romper}}</td>
                                                    <td>
                                                      @php
                                                      $a26= $carts->q_Romper;
                                                      $b26 =$price->Romper;
                                                      $dc26= $a26*$b26;
                                                      @endphp
                                                      {{$dc26}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Cushion_Cover))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Cushion_Cover}}  Cushion Cover </th>
                                                    <td>X</td>
                                                    <td>{{$price->Cushion_Cover}}</td>
                                                    <td>
                                                      @php
                                                      $a27= $carts->q_Cushion_Cover;
                                                      $b27 =$price->Cushion_Cover;
                                                      $dc27= $a27*$b27;
                                                      @endphp
                                                      {{$dc27}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Blouse))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Blouse}} Blouse </th>
                                                    <td>X</td>
                                                    <td>{{$price->Blouse}}</td>
                                                    <td>
                                                      @php
                                                      $a28= $carts->q_Blouse;
                                                      $b28 =$price->Blouse;
                                                      $dc28= $a28*$b28;
                                                      @endphp
                                                      {{$dc28}}
                                                    </td>
                                                </tr>
                                                @endif

                                                @if (is_null($carts->q_Cocktail_Dress))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Cocktail_Dress}}  Cocktail Dress </th>
                                                    <td>X</td>
                                                    <td>{{$price->Cocktail_Dress}}</td>
                                                    <td>
                                                      @php
                                                      $a29= $carts->q_Cocktail_Dress;
                                                      $b29 =$price->Cocktail_Dress;
                                                      $dc29= $a29*$b29;
                                                      @endphp
                                                      {{$dc29}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Pants))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Pants}} Pants </th>
                                                    <td>X</td>
                                                    <td>{{$price->Pants}}</td>
                                                    <td>
                                                      @php
                                                      $a30= $carts->q_Pants;
                                                      $b30 =$price->Pants;
                                                      $dc30= $a30*$b30;
                                                      @endphp
                                                      {{$dc30}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Jeans))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Jeans}} Jeans </th>
                                                    <td>X</td>
                                                    <td>{{$price->Jeans}}</td>
                                                    <td>
                                                      @php
                                                      $a31= $carts->q_Jeans;
                                                      $b31 =$price->Jeans;
                                                      $dc31= $a31*$b31;
                                                      @endphp
                                                      {{$dc31}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Suit_Jacket))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Suit_Jacket}} Suit Jacket </th>
                                                    <td>X</td>
                                                    <td>{{$price->Suit_Jacket}}</td>
                                                    <td>
                                                      @php
                                                      $a32= $carts->q_Suit_Jacket;
                                                      $b32 =$price->Suit_Jacket;
                                                      $dc32= $a32*$b32;
                                                      @endphp
                                                      {{$dc32}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Scarf))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Scarf}} Scarf </th>
                                                    <td>X</td>
                                                    <td>{{$price->Scarf}}</td>
                                                    <td>
                                                      @php
                                                      $a33= $carts->q_Scarf;
                                                      $b33 =$price->Scarf;
                                                      $dc33= $a33*$b33;
                                                      @endphp
                                                      {{$dc33}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Polo_Sport_Shirt))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Polo_Sport_Shirt}} Polo sport Shirt </th>
                                                    <td>X</td>
                                                    <td>{{$price->Polo_Sport_Shirt}}</td>
                                                    <td>
                                                      @php
                                                      $a34= $carts->q_Polo_Sport_Shirt;
                                                      $b34 =$price->Polo_Sport_Shirt;
                                                      $dc34= $a34*$b34;
                                                      @endphp
                                                      {{$dc34}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Vest))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Vest}}  Vest </th>
                                                    <td>X</td>
                                                    <td>{{$price->Vest}}</td>
                                                    <td>
                                                      @php
                                                      $a35= $carts->q_Vest;
                                                      $b35 =$price->Vest;
                                                      $dc35= $a35*$b35;
                                                      @endphp
                                                      {{$dc35}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Gloves))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Gloves}}  Gloves </th>
                                                    <td>X</td>
                                                    <td>{{$price->Gloves}}</td>
                                                    <td>
                                                      @php
                                                      $a36= $carts->q_Gloves;
                                                      $b36 =$price->Gloves;
                                                      $dc36= $a36*$b36;
                                                      @endphp
                                                      {{$dc36}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Shawl))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Shawl}}  Shawl </th>
                                                    <td>X</td>
                                                    <td>{{$price->Shawl}}</td>
                                                    <td>
                                                      @php
                                                      $a37= $carts->q_Shawl;
                                                      $b37 =$price->Shawl;
                                                      $dc37= $a37*$b37;
                                                      @endphp
                                                      {{$dc37}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Napkins))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Napkins}}  Napkins </th>
                                                    <td>X</td>
                                                    <td>{{$price->Napkins}}</td>
                                                    <td>
                                                      @php
                                                      $a38= $carts->q_Napkins;
                                                      $b38 =$price->Napkins;
                                                      $dc38= $a38*$b38;
                                                      @endphp
                                                      {{$dc38}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Lab_Coat))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Lab_Coat}}  Lab Coat </th>
                                                    <td>X</td>
                                                    <td>{{$price->Lab_Coat}}</td>
                                                    <td>
                                                      @php
                                                      $a39= $carts->q_Lab_Coat;
                                                      $b39 =$price->Lab_Coat;
                                                      $dc39= $a39*$b39;
                                                      @endphp
                                                      {{$dc39}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Sweatshirt))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Sweatshirt}} Sweatshirt </th>
                                                    <td>X</td>
                                                    <td>{{$price->Sweatshirt}}</td>
                                                    <td>
                                                      @php
                                                      $a40= $carts->q_Sweatshirt;
                                                      $b40 =$price->Sweatshirt;
                                                      $dc40= $a40*$b40;
                                                      @endphp
                                                      {{$dc40}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Overalls))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Overalls}} Overalls </th>
                                                    <td>X</td>
                                                    <td>{{$price->Overalls}}</td>
                                                    <td>
                                                      @php
                                                      $a41= $carts->q_Overalls;
                                                      $b41 =$price->Overalls;
                                                      $dc41= $a41*$b41;
                                                      @endphp
                                                      {{$dc41}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Tuxedo))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Tuxedo}}  Tuxedo </th>
                                                    <td>X</td>
                                                    <td>{{$price->Tuxedo}}</td>
                                                    <td>
                                                      @php
                                                      $a42= $carts->q_Tuxedo;
                                                      $b42 =$price->Tuxedo;
                                                      $dc42= $a42*$b42;
                                                      @endphp
                                                      {{$dc42}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Jersey))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Jersey}} Jersey </th>
                                                    <td>X</td>
                                                    <td>{{$price->Jersey}}</td>
                                                    <td>
                                                      @php
                                                      $a43= $carts->q_Jersey;
                                                      $b43 =$price->Jersey;
                                                      $dc43= $a43*$b43;
                                                      @endphp
                                                      {{$dc43}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Hoodie))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Hoodie}} Hoodie </th>
                                                    <td>X</td>
                                                    <td>{{$price->Hoodie}}</td>
                                                    <td>
                                                      @php
                                                      $a44= $carts->q_Hoodie;
                                                      $b44 =$price->Hoodie;
                                                      $dc44= $a44*$b44;
                                                      @endphp
                                                      {{$dc44}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bra))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bra}} Bra </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bra}}</td>
                                                    <td>
                                                      @php
                                                      $a45= $carts->q_Bra;
                                                      $b45 =$price->Bra;
                                                      $dc45= $a45*$b45;
                                                      @endphp
                                                      {{$dc45}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Belt))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Belt}} Belt </th>
                                                    <td>X</td>
                                                    <td>{{$price->Belt}}</td>
                                                    <td>
                                                      @php
                                                      $a46= $carts->q_Belt;
                                                      $b46 =$price->Belt;
                                                      $dc46= $a46*$b46;
                                                      @endphp
                                                      {{$dc46}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Jacket))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Jacket}} Jacket </th>
                                                    <td>X</td>
                                                    <td>{{$price->Jacket}}</td>
                                                    <td>
                                                      @php
                                                      $a47= $carts->q_Jacket;
                                                      $b47 =$price->Jacket;
                                                      $dc47= $a47*$b47;
                                                      @endphp
                                                      {{$dc47}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Coat))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Coat}} Coat </th>
                                                    <td>X</td>
                                                    <td>{{$price->Coat}}</td>
                                                    <td>
                                                      @php
                                                      $a48= $carts->q_Coat;
                                                      $b48 =$price->Coat;
                                                      $dc48= $a48*$b48;
                                                      @endphp
                                                      {{$dc48}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Coat_3_4_Coat))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Coat_3_4_Coat}}  Coat - 3/4 Coat </th>
                                                    <td>X</td>
                                                    <td>{{$price->Coat_3_4_Coat}}</td>
                                                    <td>
                                                      @php
                                                      $a49= $carts->q_Coat_3_4_Coat;
                                                      $b49 =$price->Coat_3_4_Coat;
                                                      $dc49= $a49*$b49;
                                                      @endphp
                                                      {{$dc49}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Coat_Down))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Coat_Down}}  Coat Down </th>
                                                    <td>X</td>
                                                    <td>{{$price->Coat_Down}}</td>
                                                    <td>
                                                      @php
                                                      $a50= $carts->q_Coat_Down;
                                                      $b50 =$price->Coat_Down;
                                                      $dc50= $a50*$b50;
                                                      @endphp
                                                      {{$dc50}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_two_Piece_Skirt_Suit))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_two_Piece_Skirt_Suit}} 2 Piece Skirt Suit </th>
                                                    <td>X</td>
                                                    <td>{{$price->two_Piece_Skirt_Suit}}</td>
                                                    <td>
                                                      @php
                                                      $a51= $carts->q_two_Piece_Skirt_Suit;
                                                      $b51 =$price->two_Piece_Skirt_Suit;
                                                      $dc51= $a51*$b51;
                                                      @endphp
                                                      {{$dc51}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Pillow_Case))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Pillow_Case}}  Bedding Pillow Case </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Pillow_Case}}</td>
                                                    <td>
                                                      @php
                                                      $a52= $carts->q_Bedding_Pillow_Case;
                                                      $b52 =$price->Bedding_Pillow_Case;
                                                      $dc52= $a52*$b52;
                                                      @endphp
                                                      {{$dc52}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Blanket))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Blanket}}  Bedding Blanket </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Blanket}}</td>
                                                    <td>
                                                      @php
                                                      $a53= $carts->q_Bedding_Blanket;
                                                      $b53 =$price->Bedding_Blanket;
                                                      $dc53= $a53*$b53;
                                                      @endphp
                                                      {{$dc53}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Bed_Sheet))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Bed_Sheet}} Bedding Bed Sheet </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Bed_Sheet}}</td>
                                                    <td>
                                                      @php
                                                      $a54= $carts->q_Bedding_Bed_Sheet;
                                                      $b54 =$price->Bedding_Bed_Sheet;
                                                      $dc54= $a54*$b54;
                                                      @endphp
                                                      {{$dc54}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Pillow_dry_clean))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Pillow_dry_clean}}  Bedding Pillow </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Pillow_dry_clean}}</td>
                                                    <td>
                                                      @php
                                                      $a55= $carts->q_Bedding_Pillow_dry_clean;
                                                      $b55 =$price->Bedding_Pillow_dry_clean;
                                                      $dc55= $a55*$b55;
                                                      @endphp
                                                      {{$dc55}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bathing_suit_Top))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bathing_suit_Top}}  Bathing suit Top </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bathing_suit_Top}}</td>
                                                    <td>
                                                      @php
                                                      $a56= $carts->q_Bathing_suit_Top;
                                                      $b56 =$price->Bathing_suit_Top;
                                                      $dc56= $a56*$b56;
                                                      @endphp
                                                      {{$dc56}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Down_Comforter))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Down_Comforter}}  Bedding Down Comforter </th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Down_Comforter}}</td>
                                                    <td>
                                                      @php
                                                      $a57= $carts->q_Bedding_Down_Comforter;
                                                      $b57 =$price->Bedding_Down_Comforter;
                                                      $dc57= $a57*$b57;
                                                      @endphp
                                                      {{$dc57}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Bedding_Comforter_dry_clean))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Bedding_Comforter_dry_clean}}  Bedding Comforter</th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Comforter_dry_clean}}</td>
                                                    <td>
                                                      @php
                                                      $a58= $carts->q_Bedding_Comforter_dry_clean;
                                                      $b58 =$price->Bedding_Comforter_dry_clean;
                                                      $dc58= $a58*$b58;
                                                      @endphp
                                                      {{$dc58}}
                                                    </td>
                                                </tr>
                                                @endif

                                              </tbody>
                                          </table>
                                          @endif

                                          <p class="text-uppercase"><b>Tailoring</b></p>
                                          @if ( $carts->tailoring == "none")
                                            No tailoring service requested
                                          @else
                                            <table class="table table-hover">
                                              <thead >
                                                  <tr class="active">
                                                    <th class="">Quantity</th>
                                                    <th class="">Times</th>
                                                    <th class="">Price ($)</th>
                                                    <th class="">Total</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @if (is_null($carts->q_Hemming))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Hemming}} Hemming</th>
                                                    <td>X</td>
                                                    <td>{{$price->Hemming}}</td>
                                                    <td>
                                                      @php
                                                      $a1= $carts->q_Hemming;
                                                      $b1 =$price->Hemming;
                                                      $t1= $a1*$b1;
                                                      @endphp
                                                      {{$t1}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Hemming_Pant))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Hemming_Pant}} Hemming Pant</th>
                                                    <td>X</td>
                                                    <td>{{$price->Hemming_Pant}}</td>
                                                    <td>
                                                      @php
                                                      $a2= $carts->q_Hemming_Pant;
                                                      $b2 =$price->Hemming_Pant;
                                                      $t2= $a2*$b2;
                                                      @endphp
                                                      {{$t2}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Hemming_Sleeve))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Hemming_Sleeve}} Hemming Sleeve</th>
                                                    <td>X</td>
                                                    <td>{{$price->Bedding_Comforter_laundry}}</td>
                                                    <td>
                                                      @php
                                                      $a3= $carts->q_Hemming_Sleeve;
                                                      $b3 =$price->Hemming_Sleeve;
                                                      $t3= $a3*$b3;
                                                      @endphp
                                                      {{$t3}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Taper))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Taper}}  Taper </th>
                                                    <td>X</td>
                                                    <td>{{$price->Taper}}</td>
                                                    <td>
                                                      @php
                                                      $a4= $carts->q_Taper;
                                                      $b4 =$price->Taper;
                                                      $t4= $a4*$b4;
                                                      @endphp
                                                      {{$t4}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Button))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Button}} Button </th>
                                                    <td>X</td>
                                                    <td>{{$price->Button}}</td>
                                                    <td>
                                                      @php
                                                      $a5= $carts->q_Button;
                                                      $b5 =$price->Button;
                                                      $t5= $a5*$b5;
                                                      @endphp
                                                      {{$t5}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Patch))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Patch}} Patch</th>
                                                    <td>X</td>
                                                    <td>{{$price->Patch}}</td>
                                                    <td>
                                                      @php
                                                      $a6= $carts->q_Patch;
                                                      $b6 =$price->Patch;
                                                      $t6= $a6*$b6;
                                                      @endphp
                                                      {{$t6}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @if (is_null($carts->q_Zipper))
                                                @else
                                                <tr>
                                                    <th>{{$carts->q_Zipper}} Zipper</th>
                                                    <td>X</td>
                                                    <td>{{$price->Zipper}}</td>
                                                    <td>
                                                      @php
                                                      $a7= $carts->q_Zipper;
                                                      $b7 =$price->Zipper;
                                                      $t7= $a7*$b7;
                                                      @endphp
                                                      {{$t7}}
                                                    </td>
                                                </tr>
                                                @endif

                                              </tbody>
                                          </table>
                                          @endif


                                      @endforeach





                                    </dd>

                                    <hr>
                                    <ul class="portfolio-meta m-bot-30 pull-right">
                                        <li><span>Sub Total </span>$ {{$subtotal}}</li>
                                        <li><span>Promo code off </span>$ {{$voucheroff}}</li>
                                        <hr>
                                        <li><span>Sub Total </span>$ {{$subsubtotal}}</li>
                                        <li><span> Delivery Charge	 </span>$ {{$delivery}} </li>
                                        <hr>
                                        <li><span><strong class="cart-total"> Total </strong></span> <strong class="cart-total">$ {{$finaltotal}}</strong></li>
                                    </ul>


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
