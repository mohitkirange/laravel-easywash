@extends('layouts.sp-app')

@section('content')
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12 mb-1">
        <h2 class="content-header-title">Order details</h2>
      </div>

    </div>


    <div class="content-body">
      <div class="row match-height">
          <!-- Description lists horizontal -->
          <div class="col-sm-12 col-md-4">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Order Information<small class="text-muted"></small></h4>
                      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                          <div class="card-text">
                              <dl class="row">
                                @foreach( $carts as $carts )
                                  <dt class="col-sm-5" >Order ID:</dt>
                                  <dd class="col-sm-7">#EZW000{{$carts->id}}</dd>
                                  <dt class="col-sm-5">Order Date:</dt>
                                  <dd class="col-sm-7">{{$carts->created_at}}</dd>
                                  <dt class="col-sm-5">Order amount:</dt>
                                  <dd class="col-sm-7">$ {{$finaltotal}}</dd>
                                  <dt class="col-sm-5">Order status:</dt>
                                  <dd class="col-sm-7">
                                    @if ($status === null)
                                      Pending
                                    @else
                                      {{$status->status}}
                                    @endif
                                  </dd>
                                  <dd class="col-sm-12">
                                    @if ($status === null)
                                    <progress class="progress progress-striped" value="0" max="100"></progress>
                                    @elseif ( ($status->status) == "Accepted")
                                    <progress class="progress progress-striped" value="14.28" max="100"></progress>
                                    @elseif ( ($status->status) == "Out for pickup" )
                                    <progress class="progress progress-striped" value="28.57" max="100"></progress>
                                    @elseif ( ($status->status) == "Picked up")
                                    <progress class="progress progress-striped" value="42.85" max="100"></progress>
                                    @elseif ( ($status->status) == "In store - Cleaning" )
                                    <progress class="progress progress-striped" value="57.14" max="100"></progress>
                                    @elseif ( ($status->status) == "Out for delivery")
                                    <progress class="progress progress-striped" value="71.42" max="100"></progress>
                                    @elseif ( ($status->status) == "Delivered" )
                                    <progress class="progress progress-striped" value="85.71" max="100"></progress>
                                    @elseif ( ($status->status) == "Completed")
                                    <progress class="progress progress-striped" value="100" max="100"></progress>
                                    @else

                                    @endif
                                  </dd>

                                      </dl>
                                  <hr>
                                  <a href="{{ route('sp.orders.status', ['cart_id' => $carts->id, 'service_id'=>$carts->service_id, 'sp_id'=>$carts->sp_id])}}" class="btn btn-warning btn-min-width mr-1 mb-1">Change status</a>



                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-8">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Service provider details: <small class="text-muted"></small></h4>
                      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                          <div class="card-text">
                              <dl class="row">
                                  <dt class="col-sm-3">Service ID:</dt>
                                  <dd class="col-sm-9">#{{$carts->service_id}}</dd>
                                  @foreach($services as $service)
                                  <dt class="col-sm-3">Service name:</dt>
                                  <dd class="col-sm-9">{{$service->name}}</dd>
                                  <dt class="col-sm-3">Service address:</dt>
                                  <dd class="col-sm-9">{{$service->address}} , {{$service->city}} , {{$service->state}},{{$service->zipcode}}</dd>
                                  @endforeach
                                  <dt class="col-sm-3 text-truncate">Reques pickup date:</dt>
                                  <dd class="col-sm-9"> {{$carts->dos}}</dd>

                              </dl>
                              <hr>

                              <a href="{{ route('sp.service.info', ['id' => $service->id])}}" class="btn btn-info btn-min-width mr-1 mb-1">View details</a>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <section id="description" class="card">
      <div class="card-header">
          <h4 class="card-title">Customer Details:</h4>
      </div>
      <div class="card-body collapse in">
          <div class="card-block">
              <div class="card-text">
                <dl class="row">
                    <dt class="col-sm-3">Customer ID:</dt>
                    <dd class="col-sm-9">#{{$carts->user_id}}</dd>
                    <dt class="col-sm-3">Customer Name:</dt>
                    @foreach($users as $users)
                    <dd class="col-sm-9">{{$users->name}}</dd>

                    <dt class="col-sm-3">Customer Email ID:</dt>
                    <dd class="col-sm-9">{{$users->email}}</dd>
                    <dt class="col-sm-3">Customer Address:</dt>
                    <dd class="col-sm-9">{{$users->address}}{{$users->city}},{{$users->state}},{{$users->zipcode}}</dd>
                      @endforeach
                </dl>
                <hr>
                <h4 class="card-title">Preferences:</h4>
                  @if($preferences->count()>0)
                    @foreach($preferences as $preferences)
                    <dt class="col-sm-3">Detergent:</dt>
                    <dd class="col-sm-9">{{$preferences->detergent}}</dd>
                    <dt class="col-sm-3">Fabric softener:</dt>
                    <dd class="col-sm-9">{{$preferences->fabricsoftener}}</dd>
                    <dt class="col-sm-3">Starch:</dt>
                    <dd class="col-sm-9">{{$preferences->starch}}</dd>
                    @endforeach
                  @else
                  <dt class="col-sm-3">No preferences</dt>
                  @endif



                  </div>
          </div>
      </div>
      </section>



<section id="" class="card">
<div class="card-header">
    <h4 class="card-title">Service details</h4>
    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
    <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
        </ul>
    </div>
</div>
<div class="card-body collapse in">
    <div class="card-block">

      <h5>Wash and fold: </h5>
      @if ( $carts->washandfold == "none")
        No Wash and fold service requested
      @else
      <div class="table-responsive">
          <table class="table mb-0">
              <thead class="thead-default">
                  <tr>
                      <th class="col-sm-6">Quantity</th>
                      <th class="col-sm-2">Times</th>
                      <th class="col-sm-2">Price</th>
                      <th class="col-sm-2">Total</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($prices as $price)
                @if (is_null($carts->q_Regular_Laundry))
                @else
                <tr>
                    <td class="col-sm-6">{{$carts->q_Regular_Laundry}} pounds. Regular Laundry</th>
                    <td class="col-sm-2">X</td>
                    <td class="col-sm-2">{{$price->Regular_Laundry}}</td>
                    <td class="col-sm-2">
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
                    <td class="col-sm-6">{{$carts->q_Bedding_Mattress_Duvet_Cover}} Bedding Mattress Duvet Cover</th>
                    <td class="col-sm-2">X</td>
                    <td class="col-sm-2">{{$price->Bedding_Mattress_Duvet_Cover}}</td>
                    <td class="col-sm-2">
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
                    <td class="col-sm-6">{{$carts->q_Bedding_Comforter_laundry}} Bedding Comforter</th>
                    <td class="col-sm-2">X</td>
                    <td class="col-sm-2">{{$price->Bedding_Comforter_laundry}}</td>
                    <td class="col-sm-2">
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
                    <td class="col-sm-6">{{$carts->q_Bedding_Blanket_Throw}} Bedding Blanket Throw</th>
                    <td class="col-sm-2">X</td>
                    <td class="col-sm-2">{{$price->Bedding_Blanket_Throw}}</td>
                    <td class="col-sm-2">
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
                    <td class="col-sm-6">{{$carts->q_Bedding_Pillow_laundry}} Bedding Pillow</th>
                    <td class="col-sm-2">X</td>
                    <td class="col-sm-2">{{$price->Bedding_Pillow_laundry}}</td>
                    <td class="col-sm-2">
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
                    <td class="col-sm-6">{{$carts->q_Bath_Mat_laundry}} Bath Mat</th>
                    <td class="col-sm-2">X</td>
                    <td class="col-sm-2">{{$price->Bath_Mat_laundry}}</td>
                    <td class="col-sm-2">
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
                    <td class="col-sm-6">{{$carts->q_Every_Hang_Dry_Item}} Hang Dry Items</th>
                    <td class="col-sm-2">X</td>
                    <td class="col-sm-2">{{$price->Every_Hang_Dry_Item}}</td>
                    <td class="col-sm-2">
                      @php
                      $a7= $carts->q_Every_Hang_Dry_Item;
                      $b7 =$price->Every_Hang_Dry_Item;
                      $waf7= $a7*$b7;
                      @endphp
                      {{$waf7}}
                    </td>
                </tr>
                @endif
                @endforeach
              </tbody>
          </table>
      </div>
      @endif

      <br>
      <h5>Dry cleaning: </h5>
      @if ( $carts->dryclean == "none")
        No drycleaning service requested
      @else
      <div class="table-responsive">
          <table class="table mb-0">
              <thead class="thead-default">
                  <tr>
                      <th class="col-sm-6">Quantity</th>
                      <th class="col-sm-2">Times</th>
                      <th class="col-sm-2">Price</th>
                      <th class="col-sm-2">Total</th>
                  </tr>
              </thead>
              <tbody>
                    @foreach($prices as $price)
                    @if (is_null($carts->q_Dress))
                    @else
                    <tr>
                        <td class="col-sm-6">{{$carts->q_Dress}} Dress </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Dress}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Shirt}} Shirt</td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Shirt}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Sweater}} Sweater</td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Sweater}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Dress_Childrens}} Dress_Childrens</td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Dress_Childrens}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Skirt}} Skirt</td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Skirt}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Tie}} Tie</td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Tie}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Shorts}} Shorts </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Shorts}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Jumpsuit}} Jumpsuit </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Jumpsuit}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Gown}} Gown </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Gown}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Mittens}} Mittens </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Mittens}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Leggings}} Leggings </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Leggings}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bath_Mat_dry_clean}} Batd Mat </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bath_Mat_dry_clean}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Jacket_Down}} Jacket Down </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Jacket_Down}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Nightgown}}  Nightgown </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Nightgown}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Cummerbund}} Cummerbund </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Cummerbund}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bathing_suit_one_piece}} Batding suit 1 piece </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bathing_suit_one_piece}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bathing_suit_Bottom}} Batding suit Bottom </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bathing_suit_Bottom}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Cardigan}} Cardigan </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Cardigan}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Tank_Top}}  Tank Top </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Tank_Top}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Tablecloth}} Tablecloth </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Tablecloth}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Robe}} Robe </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Robe}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Curtains_Light}} Curtains Light </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Curtains_Light}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Coat_Pea_Coat}} Coat Pea Coat </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Coat_Pea_Coat}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Coat_Overcoat}} Coat Overcoat </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Coat_Overcoat}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_two_Piece_Suit}} 2 Piece Suit </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->two_Piece_Suit}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Romper}} Romper </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Romper}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Cushion_Cover}}  Cushion Cover </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Cushion_Cover}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Blouse}} Blouse </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Blouse}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Cocktail_Dress}}  Cocktail Dress </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Cocktail_Dress}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Pants}} Pants </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Pants}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Jeans}} Jeans </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Jeans}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Suit_Jacket}} Suit Jacket </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Suit_Jacket}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Scarf}} Scarf </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Scarf}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Polo_Sport_Shirt}} Polo sport Shirt </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Polo_Sport_Shirt}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Vest}}  Vest </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Vest}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Gloves}}  Gloves </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Gloves}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Shawl}}  Shawl </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Shawl}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Napkins}}  Napkins </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Napkins}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Lab_Coat}}  Lab Coat </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Lab_Coat}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Sweatshirt}} Sweatshirt </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Sweatshirt}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Overalls}} Overalls </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Overalls}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Tuxedo}}  Tuxedo </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Tuxedo}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Jersey}} Jersey </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Jersey}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Hoodie}} Hoodie </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Hoodie}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bra}} Bra </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bra}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Belt}} Belt </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Belt}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Jacket}} Jacket </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Jacket}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Coat}} Coat </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Coat}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Coat_3_4_Coat}}  Coat - 3/4 Coat </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Coat_3_4_Coat}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Coat_Down}}  Coat Down </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Coat_Down}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_two_Piece_Skirt_Suit}} 2 Piece Skirt Suit </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->two_Piece_Skirt_Suit}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bedding_Pillow_Case}}  Bedding Pillow Case </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bedding_Pillow_Case}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bedding_Blanket}}  Bedding Blanket </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bedding_Blanket}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bedding_Bed_Sheet}} Bedding Bed Sheet </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bedding_Bed_Sheet}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bedding_Pillow_dry_clean}}  Bedding Pillow </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bedding_Pillow_dry_clean}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bathing_suit_Top}}  Batding suit Top </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bathing_suit_Top}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bedding_Down_Comforter}}  Bedding Down Comforter </td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bedding_Down_Comforter}}</td>
                        <td class="col-sm-2">
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
                        <td class="col-sm-6">{{$carts->q_Bedding_Comforter_dry_clean}}  Bedding Comforter</td>
                        <td class="col-sm-2">X</td>
                        <td class="col-sm-2">{{$price->Bedding_Comforter_dry_clean}}</td>
                        <td class="col-sm-2">
                          @php
                          $a58= $carts->q_Bedding_Comforter_dry_clean;
                          $b58 =$price->Bedding_Comforter_dry_clean;
                          $dc58= $a58*$b58;
                          @endphp
                          {{$dc58}}
                        </td>
                    </tr>
                    @endif
                    @endforeach
              </tbody>
          </table>
      </div>
      @endif

      <br>
      <h5>Tailoring: </h5>
      @if ( $carts->tailoring == "none")
          No tailoring service requested
      @else
      <div class="table-responsive">
          <table class="table mb-0">
              <thead class="thead-default">
                              <tr>
                                  <th class="col-sm-6">Quantity</th>
                                  <th class="col-sm-2">Times</th>
                                  <th class="col-sm-2">Price</th>
                                  <th class="col-sm-2">Total</th>
                              </tr>
              </thead>
              <tbody>
                          @foreach($prices as $price)
                          @if (is_null($carts->q_Hemming))
                          @else
                          <tr>
                              <td class="col-sm-6">{{$carts->q_Hemming}} Hemming</td>
                              <td class="col-sm-2">X</td>
                              <td class="col-sm-2">{{$price->Hemming}}</td>
                              <td class="col-sm-2">
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
                              <td class="col-sm-6">{{$carts->q_Hemming_Pant}} Hemming Pant</td>
                              <td class="col-sm-2">X</td>
                              <td class="col-sm-2">{{$price->Hemming_Pant}}</td>
                              <td class="col-sm-2">
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
                              <td class="col-sm-6">{{$carts->q_Hemming_Sleeve}} Hemming Sleeve</td>
                              <td class="col-sm-2">X</td>
                              <td class="col-sm-2">{{$price->Bedding_Comforter_laundry}}</td>
                              <td class="col-sm-2">
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
                              <td class="col-sm-6">{{$carts->q_Taper}}  Taper </td>
                              <td class="col-sm-2">X</td>
                              <td class="col-sm-2">{{$price->Taper}}</td>
                              <td class="col-sm-2">
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
                              <td class="col-sm-6">{{$carts->q_Button}} Button </td>
                              <td class="col-sm-2">X</td>
                              <td class="col-sm-2">{{$price->Button}}</td>
                              <td class="col-sm-2">
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
                              <td class="col-sm-6">{{$carts->q_Patch}} Patch</td>
                              <td class="col-sm-2">X</td>
                              <td class="col-sm-2">{{$price->Patch}}</td>
                              <td class="col-sm-2">
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
                              <td class="col-sm-6">{{$carts->q_Zipper}} Zipper</td>
                              <td class="col-sm-2">X</td>
                              <td class="col-sm-2">{{$price->Zipper}}</td>
                              <td class="col-sm-2">
                                @php
                                $a7= $carts->q_Zipper;
                                $b7 =$price->Zipper;
                                $t7= $a7*$b7;
                                @endphp
                                {{$t7}}
                              </td>
                          </tr>
                          @endif
                          @endforeach
              </tbody>
          </table>
      </div>
      @endif


    </div>
    @endforeach

    <hr>
    <div class="row">
    				<div class="col-md-7 col-sm-12 text-xs-center text-md-left">

    				</div>
    				<div class="col-md-5 col-sm-12">
    					<p class="lead">Total due</p>
    					<div class="table-responsive">
    						<table class="table">
    						  <tbody>
    						  	<tr>
    						  		<td>Sub Total</td>
    						  		<td class="text-xs-right">$ {{$subtotal}}</td>
    						  	</tr>
    						  	<tr>
    						  		<td>Promo code off</td>
    						  		<td class="text-xs-right">$ {{$voucheroff}}</td>
    						  	</tr>

    						  	<tr>
    						  		<td class="text-bold-800">Total</td>
    						  		<td class="text-bold-800 text-xs-right">$ {{$subsubtotal}}</td>
    						  	</tr>
    						  	<tr>
    						  		<td>Delivery Charge</td>
    						  		<td class="pink text-xs-right">(-) $ {{$delivery}}</td>
    						  	</tr>
    						  	<tr class="bg-grey bg-lighten-4">
    						  		<td class="text-bold-800">Amount paid</td>
    						  		<td class="text-bold-800 text-xs-right">$ {{$finaltotal}}</td>
    						  	</tr>
    						  </tbody>
    						</table>
    					</div>

    				</div>
    			</div>



</div>

</section>
<!--/ HTML Markup -->
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="" target="_blank" class="text-bold-800 grey darken-2">EASYWASH </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset( 'app/app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>


<script src="{{ asset( 'app/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="{{ asset( 'app/app-assets/vendors/js/ui/prism.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="{{ asset( 'app/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>

@endsection
