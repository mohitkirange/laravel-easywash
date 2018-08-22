@extends('layouts.sp-app')

@section('content')


<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12 mb-1">
        <h2 class="content-header-title">Create Price Table</h2>
      </div>

    </div>


    @if(count($errors)>0)
      <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item text-danger" >
                  {{ $error }}
            </li>
        @endforeach
      </ul>
    @endif

    @if(session('success'))
    <p class="alert alert-success alert-dismissible fade in mb-2">{{session('success')}}</p>
@endif

    <div class="content-body"><!-- Description -->
      
<!--/ Description -->
<!-- CSS Classes -->

@if($prices->count()>0 )


<div class="alert alert-primary mb-2" role="alert">
									<strong>Woah.</strong>You have already created pricing table.<br>
                  <strong>You can always view or edit by goin to Price Table -> Edit Price Table </strong>
</div>



@else

    <div class="row match-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="basic-layout-form-center">Create price Table</h4>
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

              <div class="card-text">
                <p>This example shows a way to center your form in the card. Here we have used <code>col-md-6 offset-md-3</code> classes to center the form in a full width card. User can always change those classes according to width and offset requirements. This example also uses form action buttons in the center bottom position of the card.</p>
              </div>

              <form class="form" action="{{route('sp.prices.store')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6 offset-md-3">
                    <div class="form-body">

                      <!-- // Regular_Laundry
                      // Bedding_Mattress_Duvet_Cover
                      // Bedding_Comforter_laundry
                      // Bedding_Blanket_Throw
                      // Bedding_Pillow_laundry
                      // Bath_Mat_laundry
                      // Every_Hang_Dry_Item -->


                      <h4 class="form-section"><i class="icon-drop"></i> Laundry</h4>


                          <div class="form-group">
                            <label for="Regular_Laundry">Wash and Fold (Per pound)</label>
                            <input type="text" id="eventInput1" class="form-control" placeholder="Lbs" name="Regular_Laundry">
                          </div>

                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="Bedding_Mattress_Duvet_Cover">Bedding_Mattress_Duvet_Cover</label>
                          <input type="text" name="Bedding_Mattress_Duvet_Cover" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="Bedding_Comforter_laundry">Bedding_Comforter_laundry</label>
                        <input type="text" name="Bedding_Comforter_laundry" class="form-control">
                      </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Bedding_Blanket_Throw">Bedding_Blanket_Throw</label>
                        <input type="text" name="Bedding_Blanket_Throw" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="Bedding_Pillow_laundry">Bedding_Pillow_laundry</label>
                      <input type="text" name="Bedding_Pillow_laundry" class="form-control">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Bath_Mat_laundry">Bath_Mat_laundry</label>
                      <input type="text" name="Bath_Mat_laundry" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="Every_Hang_Dry_Item">Every_Hang_Dry_Item</label>
                    <input type="text" name="Every_Hang_Dry_Item" class="form-control">
                  </div>
                  </div>
                </div>

<!-- LAUNDRY ENDS HERE -->

<!-- Shirt
Shorts
Skirt
Sweater
Sweatshirt
Nightgown
Overalls
Pants
Polo_Sport_Shirt
Robe
Romper
Scarf
Shawl
Tank_Top
Dress
Dress_Childrens
Blouse
Bra
Cardigan
Gown
Hoodie

Jacket
Jacket_Down
Suit_Jacket
Jeans
Jersey
Jumpsuit
Lab_Coat
Leggings
two_Piece_Skirt_Suit
two_Piece_Suit
Coat
Coat_3_4_Coat
Coat_Down
Coat_Overcoat
Coat_Pea_Coat
Cocktail_Dress
Cummerbund

Bath_Mat_dry_clean
Bathing_suit_Bottom
Bathing_suit_one_piece
Bathing_suit_Top
Bedding_Bed_Sheet
Bedding_Blanket
Bedding_Comforter_dry_clean
Bedding_Down_Comforter
Bedding_Pillow_dry_clean
Bedding_Pillow_Case
Tablecloth
Curtains_Light
Cushion_Cover
Mittens
Gloves
Napkins
Belt
Tie
Tuxedo
Vest -->
                      <h4 class="form-section"><i class="icon-drop"></i> Dry Cleaning</h4>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="Shirt">Shirt</label>
                          <input type="text" name="Shirt" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="Shorts">Shorts</label>
                        <input type="text" name="Shorts" class="form-control">
                      </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Skirt">Skirt</label>
                        <input type="text" name="Skirt" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Sweater">Sweater</label>
                        <input type="text" name="Sweater" class="form-control">
                      </div>
                    </div>
                  </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="Sweatshirt">Sweatshirt</label>
                        <input type="text" name="Sweatshirt" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Nightgown">Nightgown</label>
                        <input type="text" name="Nightgown" class="form-control">
                      </div>
                    </div>
                  </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="Overalls">Overalls</label>
                        <input type="text" name="Overalls" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Pants">Pants</label>
                        <input type="text" name="Pants" class="form-control">
                      </div>
                    </div>
                  </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="Polo_Sport_Shirt">Polo_Sport_Shirt</label>
                        <input type="text" name="Polo_Sport_Shirt" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Robe">Robe</label>
                        <input type="text" name="Robe" class="form-control">
                      </div>
                    </div>
                  </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="Romper">Romper</label>
                        <input type="text" name="Romper" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Scarf">Scarf</label>
                        <input type="text" name="Scarf" class="form-control">
                      </div>
                    </div>
                  </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="Shawl">Shawl</label>
                        <input type="text" name="Shawl" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Tank_Top">Tank_Top</label>
                        <input type="text" name="Tank_Top" class="form-control">
                      </div>
                    </div>
                  </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="Dress">Dress</label>
                        <input type="text" name="Dress" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="Dress_Childrens">Dress_Childrens</label>
                        <input type="text" name="Dress_Childrens" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="Blouse">Blouse</label>
                    <input type="text" name="Blouse" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="Bra">Bra</label>
                    <input type="text" name="Bra" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label for="Cardigan">Cardigan</label>
                <input type="text" name="Cardigan" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Gown">Gown</label>
                <input type="text" name="Gown" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-6">
          <div class="form-group">
            <label for="Hoodie">Hoodie</label>
            <input type="text" name="Hoodie" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="Jacket">Jacket</label>
            <input type="text" name="Jacket" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label for="Jacket_Down">Jacket_Down</label>
        <input type="text" name="Jacket_Down" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="Suit_Jacket">Suit_Jacket</label>
        <input type="text" name="Suit_Jacket" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <label for="Jeans">Jeans</label>
    <input type="text" name="Jeans" class="form-control">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="Jersey">Jersey</label>
    <input type="text" name="Jersey" class="form-control">
  </div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Jumpsuit">Jumpsuit</label>
  <input type="text" name="Jumpsuit" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Lab_Coat">Lab_Coat</label>
  <input type="text" name="Lab_Coat" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Leggings">Leggings</label>
  <input type="text" name="Leggings" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="two_Piece_Skirt_Suit">two_Piece_Skirt_Suit</label>
  <input type="text" name="two_Piece_Skirt_Suit" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="two_Piece_Suit">two_Piece_Suit</label>
  <input type="text" name="two_Piece_Suit" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Coat">Coat</label>
  <input type="text" name="Coat" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Coat_3_4_Coat">Coat_3_4_Coat</label>
  <input type="text" name="Coat_3_4_Coat" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Coat_Down">Coat_Down</label>
  <input type="text" name="Coat_Down" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Coat_Overcoat">Coat_Overcoat</label>
  <input type="text" name="Coat_Overcoat" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Coat_Pea_Coat">Coat_Pea_Coat</label>
  <input type="text" name="Coat_Pea_Coat" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Cocktail_Dress">Cocktail_Dress</label>
  <input type="text" name="Cocktail_Dress" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Cummerbund">Cummerbund</label>
  <input type="text" name="Cummerbund" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Bath_Mat_dry_clean">Bath_Mat_dry_clean</label>
  <input type="text" name="Bath_Mat_dry_clean" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Bathing_suit_Bottom">Bathing_suit_Bottom</label>
  <input type="text" name="Bathing_suit_Bottom" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Bathing_suit_one_piece">Bathing_suit_one_piece</label>
  <input type="text" name="Bathing_suit_one_piece" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Bathing_suit_Top">Bathing_suit_Top</label>
  <input type="text" name="Bathing_suit_Top" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Bedding_Bed_Sheet">Bedding_Bed_Sheet</label>
  <input type="text" name="Bedding_Bed_Sheet" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Bedding_Blanket">Bedding_Blanket</label>
  <input type="text" name="Bedding_Blanket" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Bedding_Comforter_dry_clean">Bedding_Comforter_dry_clean</label>
  <input type="text" name="Bedding_Comforter_dry_clean" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Bedding_Down_Comforter">Bedding_Down_Comforter</label>
  <input type="text" name="Bedding_Down_Comforter" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Bedding_Pillow_dry_clean">Bedding_Pillow_dry_clean</label>
  <input type="text" name="Bedding_Pillow_dry_clean" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Bedding_Pillow_Case">Bedding_Pillow_Case</label>
  <input type="text" name="Bedding_Pillow_Case" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Tablecloth">Tablecloth</label>
  <input type="text" name="Tablecloth" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Curtains_Light">Curtains_Light</label>
  <input type="text" name="Curtains_Light" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Cushion_Cover">Cushion_Cover</label>
  <input type="text" name="Cushion_Cover" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Mittens">Mittens</label>
  <input type="text" name="Mittens" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Gloves">Gloves</label>
  <input type="text" name="Gloves" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Dress_Childrens">Dress_Childrens</label>
  <input type="text" name="Dress_Childrens" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Napkins">Napkins</label>
  <input type="text" name="Napkins" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Belt">Belt</label>
  <input type="text" name="Belt" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Tie">Tie</label>
  <input type="text" name="Tie" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Tuxedo">Tuxedo</label>
  <input type="text" name="Tuxedo" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="Vest">Vest</label>
  <input type="text" name="Vest" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="Tuxedo">Tuxedo</label>
  <input type="text" name="Tuxedo" class="form-control">
</div>
</div>
</div>

                  <!-- <h4 class="form-section"><i class="icon-drop"></i> Dry Cleaning - Homeware</h4>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="price_comforter">Comforter</label>
                    <input type="text" name="price_comforter" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="price_blanket">Blanket</label>
                    <input type="text" name="price_blanket" class="form-control">
                  </div>
                </div>
              </div>

                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="price_pillow">Pillow</label>
                    <input type="text" name="price_pillow" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="price_pillowcase">Pillow Case</label>
                    <input type="text" name="price_pillowcase" class="form-control">
                  </div>
                </div>
              </div>


                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="price_curtain">Curtain</label>
                    <input type="text" name="price_curtain" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="price_duvercover">Duver Cover</label>
                    <input type="text" name="price_duvercover" class="form-control">
                  </div>
                </div>
              </div>

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="price_rug">Rug</label>
                    <input type="text" name="price_rug" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="price_sheets">Sheets</label>
                    <input type="text" name="price_sheets" class="form-control">
                  </div>
                </div>
              </div> -->

                  <h4 class="form-section"><i class="icon-drop"></i>Tailoring</h4>


                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="Hemming">Hemming</label>
                    <input type="text" name="Hemming" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="Hemming_Pant">Hemming_Pant</label>
                    <input type="text" name="Hemming_Pant" class="form-control">
                  </div>
                </div>
              </div>


              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                    <label for="Hemming_Sleeve">Hemming_Sleeve</label>
                    <input type="text" name="Hemming_Sleeve" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="Taper">Taper</label>
                    <input type="text" name="Taper" class="form-control">
                  </div>
                </div>
              </div>

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="Button">Button</label>
                    <input type="text" name="Button" class="form-control">
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="Patch">Patch</label>
                    <input type="text" name="Patch" class="form-control">
                  </div>
                </div>
              </div>

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="Zipper">Zipper</label>
                    <input type="text" name="Zipper" class="form-control">
                  </div>
                </div>
              </div>

              <h4 class="form-section"><i class="icon-drop"></i> Additional Information</h4>
              <div class="form-group">

                <textarea name="price_content" id="price_content" rows="5" cols="5" class="form-control"></textarea>
              </div>


                    </div>
                  </div>
                </div>

                <div class="form-actions center">
                  <!-- <button type="button" class="btn btn-warning mr-1">
                    <i class="icon-cross2"></i> Cancel
                  </button> -->
                  <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Create Price Table
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
 @endif
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static  fixed-bottom footer-light navbar-border">
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
