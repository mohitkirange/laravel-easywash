@extends('layouts.sp-app')

@section('content')
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12 mb-1">
        <h2 class="content-header-title">Billing details</h2>
      </div>
      <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
        <div class="breadcrumb-wrapper col-xs-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Page Layouts</a>
            </li>
            <li class="breadcrumb-item active">Light Layout
            </li>
          </ol>
        </div>
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
                                @foreach( $cart as $cart )
                                  <dt class="col-sm-5" >Order ID:</dt>
                                  <dd class="col-sm-7">#EZW000{{$cart->id}}</dd>
                                  <dt class="col-sm-5">Order Date:</dt>
                                  <dd class="col-sm-7">{{$cart->created_at}}</dd>
                                  <dt class="col-sm-5">Order status:</dt>
                                  <dd class="col-sm-7">Pending</dd>

                              </dl>
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
                                  <dd class="col-sm-9">#{{$cart->service_id}}</dd>
                                  @foreach($services as $service)
                                  <dt class="col-sm-3">Service name:</dt>
                                  <dd class="col-sm-9">{{$service->name}}</dd>
                                  <dt class="col-sm-3">Service address:</dt>
                                  <dd class="col-sm-9">{{$service->address}} , {{$service->city}} , {{$service->state}},{{$service->zipcode}}</dd>
                                  @endforeach
                                  <dt class="col-sm-3 text-truncate">Reques pickup date:</dt>
                                  <dd class="col-sm-9"> {{$cart->dos}}</dd>

                              </dl>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  @endforeach
<section id="" class="card">


<!-- create start -->
  <form class="" action="{{ route('sp.orders.bill.store', ['id' => $cart->id, 'service_id'=>$cart->service_id, 'sp_id'=>$cart->sp_id])}}" method="post">
    {{ csrf_field() }}
      <div class="card-header">
                  <h4 class="card-title">Service details</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements">
                      <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                          <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                          <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                      </ul>
                  </div>
      </div>
      <div class="card-body collapse in">
                  <div class="card-block">
                    <h5>Wash and fold: </h5>
                    @if (is_null($cart->laundry_weight))
                      No wash and fold service requested yet.
                    @else
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-default">
                                <tr>
                                    <th class="">Quantity</th><th class="">Times</th>
                                    <th class="">Price</th><th class="">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <tr>
                                    <td class="">
                                      <input type="text" size="5" value="{{$cart->laundry_weight}}" name="waf_1"> pounds</td>
                                    <!-- value="{{$cart->laundry_weight}}" -->
                                    <td class="">X</td>
                                    <td class="">
                                      <input type="text" size="5" value="{{$prices->Regular_Laundry}}" name="p_waf_1"> pounds</td>
                                    </td>
                                    <td class="">Pending</td>
                                  </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif


                    <br>
                    <h5>Dry Cleaning: </h5>
                    @if ($cart->dryclean == "none")
                      No dry clean service requested yet.
                    @elseif ($cart->dryclean == "entire")
                        Whole bag will be dry cleaned
                    @else
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-default">
                                    <tr>
                                        <th class="">Item</th>
                                        <th class="">Times</th>
                                        <th class="">Price</th>
                                        <th class="">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($drycleaning as $drycleaning)
                                      <tr>
                                        <td class="">
                                          <input type="text" size="5" name="dc[{{ $drycleaning->id }}]">

                                          <b>{{$drycleaning->name}}</b><br></td>
                                        <td class="">X</td>


                                        <td class="">
                                                    <div>
                                										<div class="form-group">
                                											<select id="projectinput5" name="p_dc[{{ $drycleaning->id }}]" class="form-control">
                                												<option value="" selected>Price of</option>
                                                        <option value="{{$prices->Bath_Mat_dry_clean}}">Bath_Mat_dry_clean</option>
                                                        <option value="{{$prices->Bath_Mat_laundry}}">Bath_Mat_laundry</option>
                                                        <option value="{{$prices->Bathing_suit_Bottom}}">Bathing_suit_Bottom</option>
                                                        <option value="{{$prices->Bathing_suit_Top}}">Bathing_suit_Top</option>
                                                        <option value="{{$prices->Bathing_suit_one_piece}}">Bathing_suit_one_piece</option>
                                                        <option value="{{$prices->Bedding_Bed_Sheet}}">Bedding_Bed_Sheet</option>
                                                        <option value="{{$prices->Bedding_Blanket_Throw}}">Bedding_Blanket_Throw</option>
                                                        <option value="{{$prices->Bedding_Blanket}}">Bedding_Blanket</option>
                                                        <option value="{{$prices->Bedding_Comforter_dry_clean}}">Bedding_Comforter_dry_clean</option>
                                                        <option value="{{$prices->Bedding_Comforter_laundry}}">Bedding_Comforter_laundry</option>
                                                        <option value="{{$prices->Bedding_Down_Comforter}}">Bedding_Down_Comforter</option>
                                                        <option value="{{$prices->Bedding_Mattress_Duvet_Cover}}">Bedding_Mattress_Duvet_Cover</option>
                                                        <option value="{{$prices->Bedding_Pillow_Case}}">Bedding_Pillow_Case</option>
                                                        <option value="{{$prices->Bedding_Pillow_dry_clean}}">Bedding_Pillow_dry_clean</option>
                                                        <option value="{{$prices->Bedding_Pillow_laundry}}">Bedding_Pillow_laundry</option>
                                                        <option value="{{$prices->Belt}}">Belt</option>
                                                        <option value="{{$prices->Blouse}}">Blouse</option>
                                                        <option value="{{$prices->Bra}}">Bra</option>
                                                        <option value="{{$prices->Cardigan}}">Cardigan</option>
                                                        <option value="{{$prices->Coat_3_4_Coat}}">Coat_3_4_Coat</option>
                                                        <option value="{{$prices->Coat_Down}}">Coat_Down</option>
                                                        <option value="{{$prices->Coat_Overcoat}}">Coat_Overcoat</option>
                                                        <option value="{{$prices->Coat_Pea_Coat}}">Coat_Pea_Coat</option>
                                                        <option value="{{$prices->Coat}}">Coat</option>
                                                        <option value="{{$prices->Cocktail_Dress}}">Cocktail_Dress</option>
                                                        <option value="{{$prices->Cummerbund}}">Cummerbund</option>
                                                        <option value="{{$prices->Curtains_Light}}">Curtains_Light</option>
                                                        <option value="{{$prices->Cushion_Cover}}">Cushion_Cover</option>
                                                        <option value="{{$prices->Dress_Childrens}}">Dress_Childrens</option>
                                                        <option value="{{$prices->Dress}}">Dress</option>
                                                        <option value="{{$prices->Every_Hang_Dry_Item}}">Every_Hang_Dry_Item</option>
                                                        <option value="{{$prices->Gloves}}">Gloves</option>
                                                        <option value="{{$prices->Gown}}">Gown</option>
                                                        <option value="{{$prices->Hoodie}}">Hoodie</option>
                                                        <option value="{{$prices->Jacket_Down}}">Jacket_Down</option>
                                                        <option value="{{$prices->Jacket}}">Jacket</option>
                                                        <option value="{{$prices->Jeans}}">Jeans</option>
                                                        <option value="{{$prices->Jersey}}">Jersey</option>
                                                        <option value="{{$prices->Jumpsuit}}">Jumpsuit</option>
                                                        <option value="{{$prices->Lab_Coat}}">Lab_Coat</option>
                                                        <option value="{{$prices->Leggings}}">Leggings</option>
                                                        <option value="{{$prices->Mittens}}">Mittens</option>
                                                        <option value="{{$prices->Napkins}}">Napkins</option>
                                                        <option value="{{$prices->Nightgown}}">Nightgown</option>
                                                        <option value="{{$prices->Overalls}}">Overalls</option>
                                                        <option value="{{$prices->Pants}}">Pants</option>
                                                        <option value="{{$prices->Polo_Sport_Shirt}}">Polo_Sport_Shirt</option>
                                                        <option value="{{$prices->Robe}}">Robe</option>
                                                        <option value="{{$prices->Romper}}">Romper</option>
                                                        <option value="{{$prices->Scarf}}">Scarf</option>
                                                        <option value="{{$prices->Shawl}}">Shawl</option>
                                                        <option value="{{$prices->Shirt}}">Shirt</option>
                                                        <option value="{{$prices->Shorts}}">Shorts</option>
                                                        <option value="{{$prices->Skirt}}">Skirt</option>
                                                        <option value="{{$prices->Suit_Jacket}}">Suit_Jacket</option>
                                                        <option value="{{$prices->Sweater}}">Sweater</option>
                                                        <option value="{{$prices->Sweatshirt}}">Sweatshirt</option>
                                                        <option value="{{$prices->Tablecloth}}">Tablecloth</option>
                                                        <option value="{{$prices->Tank_Top}}">Tank_Top</option>
                                                        <option value="{{$prices->Tie}}">Tie</option>
                                                        <option value="{{$prices->Tuxedo}}">Tuxedo</option>
                                                        <option value="{{$prices->Vest}}">Vest</option>
                                                        <option value="{{$prices->two_Piece_Skirt_Suit}}">two_Piece_Skirt_Suit</option>
                                                        <option value="{{$prices->two_Piece_Suit}}">two_Piece_Suit</option>
                                											</select>
                                										</div>
                                									</div>
                                        </td>
                                        <td class="">Pending

                                    </td>
                                        </td>
                                      </tr>
                                      @endforeach
                                      <tr>
                                      </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                        <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

                    <br>
                    <h5>Tailoring: </h5>
                    @if($tailoring->count()>0)
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-default">
                                    <tr>
                                        <th class="">Item</th>
                                        <th class="">Times</th>
                                        <th class="">Price</th>
                                        <th class="">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach( $tailoring as $tailoring )
                                      <tr>
                                        <td class="">
                                        <input type="text" size="5" name="t[{{ $tailoring->id }}]" value="">
                                        <b>{{$tailoring->name}}</b><br></td>

                                        <td class="">X</td>
                                        <td>
                                          <div class="">
                                          <div class="form-group">
                                            <select id="projectinput5" name="p_t[{{ $tailoring->id }}]" class="form-control">
                                              <option value="" selected>Price of</option>
                                              <option name="p_t_{{$tailoring->id}}" value="{{$prices->Hemming}}">Hemming</option>
                                              <option name="p_t_{{$tailoring->id}}" value="{{$prices->Hemming_Pant}}">Hemming_Pant</option>
                                              <option name="p_t_{{$tailoring->id}}" value="{{$prices->Hemming_Sleeve}}">Hemming_Sleeve</option>
                                              <option name="p_t_{{$tailoring->id}}" value="{{$prices->Taper}}">Taper</option>
                                              <option name="p_t_{{$tailoring->id}}" value="{{$prices->Button}}">Button</option>
                                              <option name="p_t_{{$tailoring->id}}" value="{{$prices->Patch}}">Patch</option>
                                              <option name="p_t_{{$tailoring->id}}" value="{{$prices->Zipper}}">Zipper</option>

                                            </select>
                                          </div>
                                            </div>
                                        </td>
                                        <td class="">Pending</td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                      No tailoring service requested yet.
                      <section id="global-settings" class="card">
                          <div class="card-header">
                              <h5 class="card-title">Add Tailoring</h5>

                              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                      <div class="heading-elements">
                                  <ul class="list-inline mb-0">
                                      <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                      <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                      <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="card-body collapse">
                              <div class="card-block">
                                  <div class="card-text">
                                      <p>The default web fonts (Helvetica Neue, Helvetica, and Arial) have been dropped in Bootstrap 4 and replaced with a “native font stack” for optimum text rendering on every device and OS. Read more about <a href="https://www.smashingmagazine.com/2015/11/using-system-ui-fonts-practical-guide/" target="_blank">native font stacks</a></p>
                                      <ul>
                                          <li>Use a <a href="/content/reboot/#native-font-stack">native font stack</a> that selects the best <code class="highlighter-rouge">font-family</code> for each OS and device.</li>
                                          <li>Use the <code class="highlighter-rouge">$font-family-base</code>, <code class="highlighter-rouge">$font-size-base</code>, and <code class="highlighter-rouge">$line-height-base</code> attributes as our typographic base applied to the <code class="highlighter-rouge">&lt;body&gt;</code>.</li>
                                          <li>Set the global link color via <code class="highlighter-rouge">$link-color</code> and apply link underlines only on <code class="highlighter-rouge">:hover</code>.</li>
                                          <li>Use <code class="highlighter-rouge">$body-bg</code> to set a <code class="highlighter-rouge">background-color</code> on the <code class="highlighter-rouge">&lt;body&gt;</code> (<code class="highlighter-rouge">#fff</code> by default).</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </section>
                    @endif
                  </div>
      </div>

      <div class="form-actions center">
        <!-- <button type="button" class="btn btn-warning mr-1">
          <i class="icon-cross2"></i> Cancel
        </button> -->
        <button type="submit" class="btn btn-primary">
          <i class="icon-check2"></i> Create Bill
        </button>
      </div>
  </form>
<!-- create ends -->



</section>
<!--/ HTML Markup -->
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="" target="_blank" class="text-bold-800 grey darken-2">EASYWASH </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
</footer>

<!--
<script type="text/javascript">

        document.getElementById('projectinput5').addEventListener("change", function(e) {
            var value = e.target.value;
            document.getElementById('store').setAttribute('name', value);
            console.log('#store name is now: ' + document.getElementById('store').getAttribute('name'))
        });

</script> -->

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
