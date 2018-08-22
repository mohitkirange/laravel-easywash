<?php

namespace App\Http\Controllers;
use App\Sp;
use Session;
use Auth;
use DB;
use App\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:sp');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $prices = DB::table('pricings')->where('sp_id',auth()->id())->get();
          return view('sp.prices.index')->with('prices', $prices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $prices = DB::table('pricings')->where('sp_id',auth()->id())->get();
      return view('sp.prices.create')->with('prices', $prices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $price = new Pricing;


  $price ->Regular_Laundry = $request->Regular_Laundry;
  $price ->Bedding_Mattress_Duvet_Cover= $request->Bedding_Mattress_Duvet_Cover;
  $price ->Bedding_Comforter_laundry= $request->Bedding_Comforter_laundry;
  $price ->Bedding_Blanket_Throw= $request->Bedding_Blanket_Throw;
    $price ->Bedding_Pillow_laundry= $request->Bedding_Pillow_laundry;
    $price ->Bath_Mat_laundry= $request->Bath_Mat_laundry;
    $price ->Every_Hang_Dry_Item= $request->Every_Hang_Dry_Item;

  $price ->Dress= $request->Dress;
  $price ->Shirt= $request->Shirt;
  $price ->Sweater= $request->Sweater;
    $price ->Dress_Childrens= $request->Dress_Childrens;
    $price ->Skirt= $request->Skirt;
    $price ->Tie= $request->Tie;
    $price ->Shorts= $request->Shorts;
    $price ->Jumpsuit= $request->Jumpsuit;
    $price ->Gown= $request->Gown;
    $price ->Mittens= $request->Mittens;
    $price ->Leggings= $request->Leggings;
    $price ->Bath_Mat_dry_clean= $request->Bath_Mat_dry_clean;
    $price ->Jacket_Down= $request->Jacket_Down;
    $price ->Nightgown= $request->Nightgown;
    $price ->Cummerbund= $request->Cummerbund;
    $price ->Bathing_suit_one_piece= $request->Bathing_suit_one_piece;
    $price ->Bathing_suit_Bottom= $request->Bathing_suit_Bottom;
    $price ->Cardigan= $request->Cardigan;
    $price ->Tank_Top= $request->Tank_Top;
    $price ->Tablecloth= $request->Tablecloth;
    $price ->Robe= $request->Robe;
    $price ->Curtains_Light= $request->Curtains_Light;
    $price ->Coat_Pea_Coat= $request->Coat_Pea_Coat;
    $price ->Coat_Overcoat= $request->Coat_Overcoat;
    $price ->two_Piece_Suit= $request->two_Piece_Suit;
    $price ->Romper= $request->Romper;
    $price ->Cushion_Cover= $request->Cushion_Cover;
    $price ->Blouse= $request->Blouse;
    $price ->Cocktail_Dress= $request->Cocktail_Dress;
    $price ->Pants= $request->Pants;
    $price ->Jeans= $request->Jeans;
    $price ->Suit_Jacket= $request->Suit_Jacket;
    $price ->Scarf= $request->Scarf;
    $price ->Polo_Sport_Shirt= $request->Polo_Sport_Shirt;
    $price ->Vest= $request->Vest;
    $price ->Gloves= $request->Gloves;
    $price ->Shawl= $request->Shawl;
    $price ->Napkins= $request->Napkins;
    $price ->Lab_Coat= $request->Lab_Coat;
    $price ->Sweatshirt= $request->Sweatshirt;
    $price ->Overalls= $request->Overalls;
    $price ->Tuxedo= $request->Tuxedo;
    $price ->Jersey= $request->Jersey;
    $price ->Hoodie= $request->Hoodie;
    $price ->Bra= $request->Bra;
    $price ->Belt= $request->Belt;
    $price ->Jacket= $request->Jacket;
    $price ->Coat= $request->Coat;
    $price ->Coat_3_4_Coat= $request->Coat_3_4_Coat;
    $price ->Coat_Down= $request->Coat_Down;
    $price ->two_Piece_Skirt_Suit= $request->two_Piece_Skirt_Suit;
    $price ->Bedding_Pillow_Case= $request->Bedding_Pillow_Case;
    $price ->Bedding_Blanket= $request->Bedding_Blanket;
    $price ->Bedding_Bed_Sheet= $request->Bedding_Bed_Sheet;
    $price ->Bedding_Pillow_dry_clean= $request->Bedding_Pillow_dry_clean;
    $price ->Bathing_suit_Top= $request->Bathing_suit_Top;
    $price ->Bedding_Down_Comforter= $request->Bedding_Down_Comforter;
    $price ->Bedding_Comforter_dry_clean= $request->Bedding_Comforter_dry_clean;

    $price ->Hemming= $request->Hemming;
    $price ->Hemming_Pant= $request->Hemming_Pant;
    $price ->Hemming_Sleeve= $request->Hemming_Sleeve;
    $price ->Taper= $request->Taper;
    $price ->Button= $request->Button;
    $price ->Patch= $request->Patch;
    $price ->Zipper= $request->Zipper;

    $price->price_content = $request->price_content ;

      $price->sp_id=auth()->id();
      $price->save();

      return redirect()->route('sp.prices.index');
      Session::flash('success','Price table saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function show(Pricing $pricing)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricing $pricing, $id)
    {
      $price = Pricing::find($id);
      return view('sp.prices.edit')->with('price', $price);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pricing $pricing,$id)
    {
      $price = Pricing::find($id);


        $price ->Regular_Laundry = $request->Regular_Laundry;
        $price ->Bedding_Mattress_Duvet_Cover= $request->Bedding_Mattress_Duvet_Cover;
        $price ->Bedding_Comforter_laundry= $request->Bedding_Comforter_laundry;
        $price ->Bedding_Blanket_Throw= $request->Bedding_Blanket_Throw;
          $price ->Bedding_Pillow_laundry= $request->Bedding_Pillow_laundry;
          $price ->Bath_Mat_laundry= $request->Bath_Mat_laundry;
          $price ->Every_Hang_Dry_Item= $request->Every_Hang_Dry_Item;

        $price->Dress= $request->Dress;
        $price->Shirt= $request->Shirt;
        $price ->Sweater= $request->Sweater;
          $price ->Dress_Childrens= $request->Dress_Childrens;
          $price ->Skirt= $request->Skirt;
          $price ->Tie= $request->Tie;
          $price ->Shorts= $request->Shorts;
          $price ->Jumpsuit= $request->Jumpsuit;
          $price ->Gown= $request->Gown;
          $price ->Mittens= $request->Mittens;
          $price ->Leggings= $request->Leggings;
          $price ->Bath_Mat_dry_clean= $request->Bath_Mat_dry_clean;
          $price ->Jacket_Down= $request->Jacket_Down;
          $price ->Nightgown= $request->Nightgown;
          $price ->Cummerbund= $request->Cummerbund;
          $price ->Bathing_suit_one_piece= $request->Bathing_suit_one_piece;
          $price ->Bathing_suit_Bottom= $request->Bathing_suit_Bottom;
          $price ->Cardigan= $request->Cardigan;
          $price ->Tank_Top= $request->Tank_Top;
          $price ->Tablecloth= $request->Tablecloth;
          $price ->Robe= $request->Robe;
          $price ->Curtains_Light= $request->Curtains_Light;
          $price ->Coat_Pea_Coat= $request->Coat_Pea_Coat;
          $price ->Coat_Overcoat= $request->Coat_Overcoat;
          $price ->two_Piece_Suit= $request->two_Piece_Suit;
          $price ->Romper= $request->Romper;
          $price ->Cushion_Cover= $request->Cushion_Cover;
          $price ->Blouse= $request->Blouse;
          $price ->Cocktail_Dress= $request->Cocktail_Dress;
          $price ->Pants= $request->Pants;
          $price ->Jeans= $request->Jeans;
          $price ->Suit_Jacket= $request->Suit_Jacket;
          $price ->Scarf= $request->Scarf;
          $price ->Polo_Sport_Shirt= $request->Polo_Sport_Shirt;
          $price ->Vest= $request->Vest;
          $price ->Gloves= $request->Gloves;
          $price ->Shawl= $request->Shawl;
          $price ->Napkins= $request->Napkins;
          $price ->Lab_Coat= $request->Lab_Coat;
          $price ->Sweatshirt= $request->Sweatshirt;
          $price ->Overalls= $request->Overalls;
          $price ->Tuxedo= $request->Tuxedo;
          $price ->Jersey= $request->Jersey;
          $price ->Hoodie= $request->Hoodie;
          $price ->Bra= $request->Bra;
          $price ->Belt= $request->Belt;
          $price ->Jacket= $request->Jacket;
          $price ->Coat= $request->Coat;
          $price ->Coat_3_4_Coat= $request->Coat_3_4_Coat;
          $price ->Coat_Down= $request->Coat_Down;
          $price ->two_Piece_Skirt_Suit= $request->two_Piece_Skirt_Suit;
          $price ->Bedding_Pillow_Case= $request->Bedding_Pillow_Case;
          $price ->Bedding_Blanket= $request->Bedding_Blanket;
          $price ->Bedding_Bed_Sheet= $request->Bedding_Bed_Sheet;
          $price ->Bedding_Pillow_dry_clean= $request->Bedding_Pillow_dry_clean;
          $price ->Bathing_suit_Top= $request->Bathing_suit_Top;
          $price ->Bedding_Down_Comforter= $request->Bedding_Down_Comforter;
          $price ->Bedding_Comforter_dry_clean= $request->Bedding_Comforter_dry_clean;

          $price ->Hemming= $request->Hemming;
          $price ->Hemming_Pant= $request->Hemming_Pant;
          $price ->Hemming_Sleeve= $request->Hemming_Sleeve;
          $price ->Taper= $request->Taper;
          $price ->Button= $request->Button;
          $price ->Patch= $request->Patch;
          $price ->Zipper= $request->Zipper;

          $price->price_content = $request->price_content ;
          $price->save();


      Session::flash('success', 'You successfully updated prices');
      return redirect()->route('sp.prices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricing $pricing)
    {
        //
    }
}
