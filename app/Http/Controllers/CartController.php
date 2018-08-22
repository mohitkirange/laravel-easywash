<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\User;
use App\Sp;
use App\Pricing;
use App\Order;
use App\service;
use App\Category;
use App\Workingday;
use App\Schedule;
use App\Comment;
use App\cart;
use App\drycleaning;
use App\tailoring;
use Stripe\Stripe;
use Stripe\Charge;
use Mail;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Notifications\NotifySP;
use App\Notifications\OrderSP;
use App\Notifications\OrderUser;
use Illuminate\Notifications\Notification;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sp_id, $service_id)
    {
      $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
      $drycleaning = drycleaning::all();
      $tailoring = tailoring::all();
      $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
      $avg_rating = round($rating,2);
      $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();

      $categories = Category::whereHas('services',
       function($query) use($service_id) {
          $query->where('services.id', $service_id);
      })->get();

      $workingdays = Workingday::whereHas('services',
       function($query) use($service_id) {
          $query->where('services.id', $service_id);
      })->get();

      return view('user.cart')
      ->with('categories', $categories)
      ->with('workingdays', $workingdays)
      ->with('prices', $prices)
      ->with('tailoring', $tailoring)
      ->with('drycleaning', $drycleaning)
      ->with('avg_rating', $avg_rating)
      ->with('services', $services);
    }


    public function index1($sp_id, $service_id)
    {
      $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
      $drycleaning = drycleaning::all();
      $tailoring = tailoring::all();
      $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
      $avg_rating = round($rating,2);
      $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
      $cart = DB::table('carts')->where('carts.service_id', '=' , $service_id)->where('carts.sp_id','=', $sp_id)->where('user_id', '=' , auth()->id())->orderBy('id', 'desc')->take(1)->get();

      return view('user.cart1')->with('prices', $prices)->with('cart', $cart)->with('tailoring', $tailoring)->with('drycleaning', $drycleaning)->with('avg_rating', $avg_rating)->with('services', $services)->with('categories', Category::all())->with('$workingday', Workingday::all());
    }

    public function checkout()
    {
  }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request,$sp_id, $service_id)
     {

       // $this->validate($request, [
       //   'dos' => 'required',
       //   'dryclean' => 'required',
       //   'washandfold' => 'required',
       //   'tailoring' => 'required',
       // ]);

       $cart = cart::create([
       'dos' => $request->dos,
       'washandfold' => $request->washandfold,
       'dryclean' => $request->dryclean,
       'tailoring' => $request->tailoring,
       'voucher' => $request->voucher,
       'qshirt' => $request->qshirt,

      'q_Regular_Laundry' => $request->q_Regular_Laundry,
      'q_Bedding_Mattress_Duvet_Cover' => $request->q_Bedding_Mattress_Duvet_Cover,
      'q_Bedding_Comforter_laundry' => $request->q_Bedding_Comforter_laundry,
      'q_Bedding_Blanket_Throw' => $request->q_Bedding_Blanket_Throw,
      'q_Bedding_Pillow_laundry' => $request->q_Bedding_Pillow_laundry,
      'q_Bath_Mat_laundry' => $request->q_Bath_Mat_laundry,
      'q_Every_Hang_Dry_Item' => $request->q_Every_Hang_Dry_Item,
      'q_Dress' => $request->q_Dress,
      'q_Shirt' => $request->q_Shirt,
      'q_Sweater' => $request->q_Sweater,
      'q_Dress_Childrens' => $request->q_Dress_Childrens,
      'q_Skirt' => $request->q_Skirt,
      'q_Tie' => $request->q_Tie,
      'q_Shorts' => $request->q_Shorts,
      'q_Jumpsuit' => $request->q_Jumpsuit,
      'q_Gown' => $request->q_Gown,
      'q_Mittens' => $request->q_Mittens,
      'q_Leggings' => $request->q_Leggings,
      'q_Bath_Mat_dry_clean' => $request->q_Bath_Mat_dry_clean,
      'q_Jacket_Down' => $request->q_Jacket_Down,
      'q_Nightgown' => $request->q_Nightgown,
      'q_Cummerbund' => $request->q_Cummerbund,
      'q_Bathing_suit_one_piece' => $request->q_Bathing_suit_one_piece,
      'q_Bathing_suit_Bottom' => $request->q_Bathing_suit_Bottom,
      'q_Cardigan' => $request->q_Cardigan,
      'q_Tank_Top' => $request->q_Tank_Top,
      'q_Tablecloth' => $request->q_Tablecloth,
      'q_Robe' => $request->q_Robe,
      'q_Curtains_Light' => $request->q_Curtains_Light,
      'q_Coat_Pea_Coat' => $request->q_Coat_Pea_Coat,
      'q_Coat_Overcoat' => $request->q_Coat_Overcoat,
      'q_two_Piece_Suit' => $request->q_two_Piece_Suit,
      'q_Romper' => $request->q_Romper,
      'q_Cushion_Cover' => $request->q_Cushion_Cover,
      'q_Blouse' => $request->q_Blouse,
      'q_Cocktail_Dress' => $request->q_Cocktail_Dress,
      'q_Pants' => $request->q_Pants,
      'q_Jeans' => $request->q_Jeans,
      'q_Suit_Jacket' => $request->q_Suit_Jacket,
      'q_Scarf' => $request->q_Scarf,
      'q_Polo_Sport_Shirt' => $request->q_Polo_Sport_Shirt,
      'q_Vest' => $request->q_Vest,
      'q_Gloves' => $request->q_Gloves,
      'q_Shawl' => $request->q_Shawl,
      'q_Napkins' => $request->q_Napkins,
      'q_Lab_Coat' => $request->q_Lab_Coat,
      'q_Sweatshirt' => $request->q_Sweatshirt,
      'q_Overalls' => $request->q_Overalls,
      'q_Tuxedo' => $request->q_Tuxedo,
      'q_Jersey' => $request->q_Jersey,
      'q_Hoodie' => $request->q_Hoodie,
      'q_Bra' => $request->q_Bra,
      'q_Belt' => $request->q_Belt,
      'q_Jacket' => $request->q_Jacket,
      'q_Coat' => $request->q_Coat,
      'q_Coat_3_4_Coat' => $request->q_Coat_3_4_Coat,
      'q_Coat_Down' => $request->q_Coat_Down,
      'q_two_Piece_Skirt_Suit' => $request->q_two_Piece_Skirt_Suit,
      'q_Bedding_Pillow_Case' => $request->q_Bedding_Pillow_Case,
      'q_Bedding_Blanket' => $request->q_Bedding_Blanket,
      'q_Bedding_Bed_Sheet' => $request->q_Bedding_Bed_Sheet,
      'q_Bedding_Pillow_dry_clean' => $request->q_Bedding_Pillow_dry_clean,
      'q_Bathing_suit_Top' => $request->q_Bathing_suit_Top,
      'q_Bedding_Down_Comforter' => $request->q_Bedding_Down_Comforter,
      'q_Bedding_Comforter_dry_clean' => $request->q_Bedding_Comforter_dry_clean,
      'q_Hemming' => $request->q_Hemming,
      'q_Hemming_Pant' => $request->q_Hemming_Pant,
      'q_Hemming_Sleeve' => $request->q_Hemming_Sleeve,
      'q_Taper' => $request->q_Taper,
      'q_Button' => $request->q_Button,
      'q_Patch' => $request->q_Patch,
      'q_Zipper' => $request->q_Zipper,
       ]);

       $cart->user_id=auth()->id();
       $cart->sp_id= $sp_id;
       $cart->service_id= $service_id;
       $cart->save();

       Session::flash('success','order requested successfully');
       $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
       $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
       $drycleaning = drycleaning::all();
       $tailoring = tailoring::all();
       $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
       $avg_rating = round($rating,2);
       // $carts = DB::table('carts')->where('carts.user_id', '=' , auth()->id())->orderBy('id', 'desc')->get();
       $cart = DB::table('carts')->latest()->first();


       $currentuserid = Auth::user()->id;
       // dd($request->all());
             return view('user.cart1')->with('prices', $prices)->with('cart', $cart)->with('tailoring', $tailoring)->with('drycleaning', $drycleaning)->with('avg_rating', $avg_rating)->with('services', $services)->with('categories', Category::all())->with('$workingday', Workingday::all());

     }

      public function stored(Request $request,$sp_id, $service_id)
      {
        $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
               $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
               $drycleaning = drycleaning::all();
               $tailoring = tailoring::all();
               $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
               $avg_rating = round($rating,2);
               $carts = DB::table('carts')->where('carts.user_id', '=' , auth()->id())->orderBy('id', 'desc')->get();
               $currentuserid = Auth::user()->id;
               return view('user.store')->with('prices', $prices)->with('carts', $carts)->with('tailoring', $tailoring)->with('drycleaning', $drycleaning)->with('avg_rating', $avg_rating)->with('services', $services)->with('categories', Category::all())->with('$workingday', Workingday::all());

      }

     public function cartreview(Request $request,$sp_id, $service_id,$cart_id)
     {
              $orders = DB::table('orders')->where('orders.cart_id', '=' , $cart_id)->first();
              $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
              $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
              $drycleaning = drycleaning::all();
              $tailoring = tailoring::all();
              $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
              $avg_rating = round($rating,2);
              $carts = DB::table('carts')->where('carts.id', '=' , $cart_id)->first();
              $categories = Category::whereHas('services',
               function($query) use($service_id) {
                  $query->where('services.id', $service_id);
              })->get();

              $workingdays = Workingday::whereHas('services',
               function($query) use($service_id) {
                  $query->where('services.id', $service_id);
              })->get();


                $waf = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('washandfold');

                if( $waf[0] == "none" )
                { $waftotal=0; }
                else {
                  $waf1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Regular_Laundry*carts.q_Regular_Laundry) AS waf1'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                    $waf2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Mattress_Duvet_Cover*carts.q_Bedding_Mattress_Duvet_Cover) AS waf2'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                    $waf3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Comforter_laundry*carts.q_Bedding_Comforter_laundry) AS waf3'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                    $waf4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Blanket_Throw*carts.q_Bedding_Blanket_Throw) AS waf4'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                    $waf5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Pillow_laundry*carts.q_Bedding_Pillow_laundry) AS waf5'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                    $waf6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bath_Mat_laundry*carts.q_Bath_Mat_laundry) AS waf6'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                    $waf7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Every_Hang_Dry_Item*carts.q_Every_Hang_Dry_Item) AS waf7'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $waftotal = $waf1->waf1 + $waf2->waf2 + $waf3->waf3 + $waf4->waf4 + $waf5->waf5 + $waf6->waf6 + $waf7->waf7 ;
                }

                $dc = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('dryclean');

                if( $dc[0] == "none" )
                { $dctotal=0; }
                else {
                  $dc1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Dress*carts.q_Dress) AS dc1'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Shirt*carts.q_Shirt) AS dc2'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Sweater*carts.q_Sweater) AS dc3'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Dress_Childrens*carts.q_Dress_Childrens) AS dc4'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Skirt*carts.q_Skirt) AS dc5'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Tie*carts.q_Tie) AS dc6'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Shorts*carts.q_Shorts) AS dc7'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc8 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Jumpsuit*carts.q_Jumpsuit) AS dc8'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc9 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Gown*carts.q_Gown) AS dc9'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc10 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Mittens*carts.q_Mittens) AS dc10'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc11 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Leggings*carts.q_Leggings) AS dc11'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc12 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bath_Mat_dry_clean*carts.q_Bath_Mat_dry_clean) AS dc12'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc13 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Jacket_Down*carts.q_Jacket_Down) AS dc13'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc14 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Nightgown*carts.q_Nightgown) AS dc14'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc15 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Cummerbund*carts.q_Cummerbund) AS dc15'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc16 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bathing_suit_one_piece*carts.q_Bathing_suit_one_piece) AS dc16'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc17 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bathing_suit_Bottom*carts.q_Bathing_suit_Bottom) AS dc17'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc18 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Cardigan*carts.q_Cardigan) AS dc18'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc19 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Tank_Top*carts.q_Tank_Top) AS dc19'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc20 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Shorts*carts.q_Shorts) AS dc20'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc21 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Robe*carts.q_Robe) AS dc21'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc22 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Curtains_Light*carts.q_Curtains_Light) AS dc22'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc23 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Coat_Pea_Coat*carts.q_Coat_Pea_Coat) AS dc23'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc24 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Coat_Overcoat*carts.q_Coat_Overcoat) AS dc24'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc25 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.two_Piece_Suit*carts.q_two_Piece_Suit) AS dc25'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc26 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Romper*carts.q_Romper) AS dc26'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc27 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Cushion_Cover*carts.q_Cushion_Cover) AS dc27'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc28 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Blouse*carts.q_Blouse) AS dc28'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc29 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Cocktail_Dress*carts.q_Cocktail_Dress) AS dc29'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc30 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Pants*carts.q_Pants) AS dc30'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc31 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Jeans*carts.q_Jeans) AS dc31'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc32 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Suit_Jacket*carts.q_Suit_Jacket) AS dc32'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc33 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Scarf*carts.q_Scarf) AS dc33'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc34 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Polo_Sport_Shirt*carts.q_Polo_Sport_Shirt) AS dc34'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc35 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Vest*carts.q_Vest) AS dc35'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc36 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Gloves*carts.q_Gloves) AS dc36'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc37 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Shawl*carts.q_Shawl) AS dc37'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc38 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Napkins*carts.q_Napkins) AS dc38'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc39 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Lab_Coat*carts.q_Lab_Coat) AS dc39'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc40 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Sweatshirt*carts.q_Sweatshirt) AS dc40'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc41 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Overalls*carts.q_Overalls) AS dc41'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc42 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Tuxedo*carts.q_Tuxedo) AS dc42'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc43 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Jersey*carts.q_Jersey) AS dc43'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc44 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Hoodie*carts.q_Hoodie) AS dc44'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc45 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bra*carts.q_Bra) AS dc45'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc46 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Belt*carts.q_Belt) AS dc46'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc47 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Jacket*carts.q_Jacket) AS dc47'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc48 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Coat*carts.q_Coat) AS dc48'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc49 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Coat_3_4_Coat*carts.q_Coat_3_4_Coat) AS dc49'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc50 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Coat_Down*carts.q_Coat_Down) AS dc50'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc51 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.two_Piece_Skirt_Suit*carts.q_two_Piece_Skirt_Suit) AS dc51'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc52 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Pillow_Case*carts.q_Bedding_Pillow_Case) AS dc52'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc53 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Blanket*carts.q_Bedding_Blanket) AS dc53'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc54 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Bed_Sheet*carts.q_Bedding_Bed_Sheet) AS dc54'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc55 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Pillow_dry_clean*carts.q_Bedding_Pillow_dry_clean) AS dc55'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc56 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bathing_suit_Top*carts.q_Bathing_suit_Top) AS dc56'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc57 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Down_Comforter*carts.q_Bedding_Down_Comforter) AS dc57'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $dc58 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Bedding_Comforter_dry_clean*carts.q_Bedding_Comforter_dry_clean) AS dc58'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();

                  $dctotal = $dc1 ->dc1  + $dc2 ->dc2  + $dc3 ->dc3  + $dc4 ->dc4  + $dc5 ->dc5  + $dc6 ->dc6  + $dc7 ->dc7  +
                   $dc8 ->dc8  + $dc9 ->dc9  + $dc10->dc10 + $dc11->dc11 + $dc12->dc12 + $dc13->dc13 + $dc14->dc14 + $dc15->dc15 +
                   $dc16->dc16 + $dc17->dc17 + $dc18->dc18 + $dc19->dc19 + $dc20->dc20 + $dc21->dc21 + $dc22->dc22 + $dc23->dc23 +
                   $dc24->dc24 + $dc25->dc25 + $dc26->dc26 + $dc27->dc27 + $dc28->dc28 + $dc29->dc29 + $dc30->dc30 + $dc31->dc31 +
                   $dc32->dc32 + $dc33->dc33 + $dc34->dc34 + $dc35->dc35 + $dc36->dc36 + $dc37->dc37 + $dc38->dc38 + $dc39->dc39 +
                   $dc40->dc40 + $dc41->dc41 + $dc42->dc42 + $dc43->dc43 + $dc44->dc44 + $dc45->dc45 + $dc46->dc46 + $dc47->dc47 +
                   $dc48->dc48 + $dc49->dc49 + $dc50->dc50 + $dc51->dc51 + $dc52->dc52 + $dc53->dc53 + $dc54->dc54 + $dc55->dc55 +
                   $dc56->dc56 + $dc57->dc57 + $dc58->dc58;
                }

                $t = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('tailoring');

                if( $t[0] == "none" )
                { $ttotal=0; }
                else {

                  $t1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Hemming*carts.q_Hemming) AS t1'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $t2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Hemming_Pant*carts.q_Hemming_Pant) AS t2'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $t3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Hemming_Sleeve*carts.q_Hemming_Sleeve) AS t3'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $t4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Taper*carts.q_Taper) AS t4'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $t5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Button*carts.q_Button) AS t5'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $t6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Patch*carts.q_Patch) AS t6'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                  $t7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                  ->select(DB::raw('sum(pricings.Zipper*carts.q_Zipper) AS t7'))
                  ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();

                  $ttotal =  $t1->t1 + $t2->t2 + $t3->t3 + $t4->t4 + $t5->t5 + $t6->t6 + $t7->t7;
                }

              $voucher = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('voucher');

              $subtotal = $waftotal + $dctotal + $ttotal;

                if($voucher[0] == "summer15")
                { $voucheroff = 15;  }
                else { $voucheroff = 0;}

                if($subtotal >= $voucheroff)
                { $subsubtotal = $subtotal - $voucheroff; }
                else { $subsubtotal = 0;}



                if($subsubtotal < 30)
                {   $delivery = 4.99; }
                else { $delivery = 0; }

                $finaltotal = $subsubtotal + $delivery;

                $billamount = $finaltotal * 100;

              return view('user.cartreview')
              ->with('subsubtotal', $subsubtotal)
              ->with('voucheroff', $voucheroff)
              ->with('subtotal', $subtotal)
              ->with('delivery', $delivery)
              ->with('finaltotal', $finaltotal)
              ->with('billamount', $billamount)
              ->with('prices', $prices)
              ->with('carts', $carts)
              ->with('tailoring', $tailoring)
              ->with('drycleaning', $drycleaning)
              ->with('avg_rating', $avg_rating)
              ->with('services', $services)
              ->with('categories', $categories)
              ->with('workingdays', $workingdays)
              ->with('orders', $orders);


     }

     public function pay(Request $request,$sp_id, $service_id,$cart_id)
     {
       $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
       $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
       $drycleaning = drycleaning::all();
       $tailoring = tailoring::all();
       $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
       $avg_rating = round($rating,2);
       $carts = DB::table('carts')->where('carts.id', '=' , $cart_id)->first();
       $categories = Category::whereHas('services',
        function($query) use($service_id) {
           $query->where('services.id', $service_id);
       })->get();

       $workingdays = Workingday::whereHas('services',
        function($query) use($service_id) {
           $query->where('services.id', $service_id);
       })->get();

                       $waf = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('washandfold');

                       if( $waf[0] == "none" )
                       { $waftotal=0; }
                       else {
                         $waf1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Regular_Laundry*carts.q_Regular_Laundry) AS waf1'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                           $waf2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Mattress_Duvet_Cover*carts.q_Bedding_Mattress_Duvet_Cover) AS waf2'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                           $waf3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Comforter_laundry*carts.q_Bedding_Comforter_laundry) AS waf3'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                           $waf4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Blanket_Throw*carts.q_Bedding_Blanket_Throw) AS waf4'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                           $waf5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Pillow_laundry*carts.q_Bedding_Pillow_laundry) AS waf5'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                           $waf6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bath_Mat_laundry*carts.q_Bath_Mat_laundry) AS waf6'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                           $waf7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Every_Hang_Dry_Item*carts.q_Every_Hang_Dry_Item) AS waf7'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $waftotal = $waf1->waf1 + $waf2->waf2 + $waf3->waf3 + $waf4->waf4 + $waf5->waf5 + $waf6->waf6 + $waf7->waf7 ;
                       }

                       $dc = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('dryclean');

                       if( $dc[0] == "none" )
                       { $dctotal=0; }
                       else {
                         $dc1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Dress*carts.q_Dress) AS dc1'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Shirt*carts.q_Shirt) AS dc2'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Sweater*carts.q_Sweater) AS dc3'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Dress_Childrens*carts.q_Dress_Childrens) AS dc4'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Skirt*carts.q_Skirt) AS dc5'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Tie*carts.q_Tie) AS dc6'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Shorts*carts.q_Shorts) AS dc7'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc8 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Jumpsuit*carts.q_Jumpsuit) AS dc8'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc9 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Gown*carts.q_Gown) AS dc9'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc10 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Mittens*carts.q_Mittens) AS dc10'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc11 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Leggings*carts.q_Leggings) AS dc11'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc12 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bath_Mat_dry_clean*carts.q_Bath_Mat_dry_clean) AS dc12'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc13 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Jacket_Down*carts.q_Jacket_Down) AS dc13'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc14 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Nightgown*carts.q_Nightgown) AS dc14'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc15 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Cummerbund*carts.q_Cummerbund) AS dc15'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc16 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bathing_suit_one_piece*carts.q_Bathing_suit_one_piece) AS dc16'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc17 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bathing_suit_Bottom*carts.q_Bathing_suit_Bottom) AS dc17'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc18 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Cardigan*carts.q_Cardigan) AS dc18'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc19 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Tank_Top*carts.q_Tank_Top) AS dc19'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc20 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Shorts*carts.q_Shorts) AS dc20'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc21 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Robe*carts.q_Robe) AS dc21'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc22 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Curtains_Light*carts.q_Curtains_Light) AS dc22'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc23 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Coat_Pea_Coat*carts.q_Coat_Pea_Coat) AS dc23'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc24 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Coat_Overcoat*carts.q_Coat_Overcoat) AS dc24'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc25 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.two_Piece_Suit*carts.q_two_Piece_Suit) AS dc25'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc26 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Romper*carts.q_Romper) AS dc26'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc27 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Cushion_Cover*carts.q_Cushion_Cover) AS dc27'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc28 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Blouse*carts.q_Blouse) AS dc28'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc29 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Cocktail_Dress*carts.q_Cocktail_Dress) AS dc29'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc30 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Pants*carts.q_Pants) AS dc30'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc31 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Jeans*carts.q_Jeans) AS dc31'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc32 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Suit_Jacket*carts.q_Suit_Jacket) AS dc32'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc33 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Scarf*carts.q_Scarf) AS dc33'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc34 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Polo_Sport_Shirt*carts.q_Polo_Sport_Shirt) AS dc34'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc35 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Vest*carts.q_Vest) AS dc35'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc36 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Gloves*carts.q_Gloves) AS dc36'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc37 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Shawl*carts.q_Shawl) AS dc37'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc38 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Napkins*carts.q_Napkins) AS dc38'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc39 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Lab_Coat*carts.q_Lab_Coat) AS dc39'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc40 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Sweatshirt*carts.q_Sweatshirt) AS dc40'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc41 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Overalls*carts.q_Overalls) AS dc41'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc42 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Tuxedo*carts.q_Tuxedo) AS dc42'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc43 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Jersey*carts.q_Jersey) AS dc43'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc44 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Hoodie*carts.q_Hoodie) AS dc44'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc45 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bra*carts.q_Bra) AS dc45'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc46 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Belt*carts.q_Belt) AS dc46'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc47 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Jacket*carts.q_Jacket) AS dc47'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc48 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Coat*carts.q_Coat) AS dc48'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc49 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Coat_3_4_Coat*carts.q_Coat_3_4_Coat) AS dc49'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc50 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Coat_Down*carts.q_Coat_Down) AS dc50'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc51 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.two_Piece_Skirt_Suit*carts.q_two_Piece_Skirt_Suit) AS dc51'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc52 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Pillow_Case*carts.q_Bedding_Pillow_Case) AS dc52'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc53 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Blanket*carts.q_Bedding_Blanket) AS dc53'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc54 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Bed_Sheet*carts.q_Bedding_Bed_Sheet) AS dc54'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc55 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Pillow_dry_clean*carts.q_Bedding_Pillow_dry_clean) AS dc55'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc56 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bathing_suit_Top*carts.q_Bathing_suit_Top) AS dc56'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc57 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Down_Comforter*carts.q_Bedding_Down_Comforter) AS dc57'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $dc58 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Bedding_Comforter_dry_clean*carts.q_Bedding_Comforter_dry_clean) AS dc58'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();

                         $dctotal = $dc1 ->dc1  + $dc2 ->dc2  + $dc3 ->dc3  + $dc4 ->dc4  + $dc5 ->dc5  + $dc6 ->dc6  + $dc7 ->dc7  +
                          $dc8 ->dc8  + $dc9 ->dc9  + $dc10->dc10 + $dc11->dc11 + $dc12->dc12 + $dc13->dc13 + $dc14->dc14 + $dc15->dc15 +
                          $dc16->dc16 + $dc17->dc17 + $dc18->dc18 + $dc19->dc19 + $dc20->dc20 + $dc21->dc21 + $dc22->dc22 + $dc23->dc23 +
                          $dc24->dc24 + $dc25->dc25 + $dc26->dc26 + $dc27->dc27 + $dc28->dc28 + $dc29->dc29 + $dc30->dc30 + $dc31->dc31 +
                          $dc32->dc32 + $dc33->dc33 + $dc34->dc34 + $dc35->dc35 + $dc36->dc36 + $dc37->dc37 + $dc38->dc38 + $dc39->dc39 +
                          $dc40->dc40 + $dc41->dc41 + $dc42->dc42 + $dc43->dc43 + $dc44->dc44 + $dc45->dc45 + $dc46->dc46 + $dc47->dc47 +
                          $dc48->dc48 + $dc49->dc49 + $dc50->dc50 + $dc51->dc51 + $dc52->dc52 + $dc53->dc53 + $dc54->dc54 + $dc55->dc55 +
                          $dc56->dc56 + $dc57->dc57 + $dc58->dc58;
                       }

                       $t = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('tailoring');

                       if( $t[0] == "none" )
                       { $ttotal=0; }
                       else {

                         $t1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Hemming*carts.q_Hemming) AS t1'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $t2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Hemming_Pant*carts.q_Hemming_Pant) AS t2'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $t3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Hemming_Sleeve*carts.q_Hemming_Sleeve) AS t3'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $t4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Taper*carts.q_Taper) AS t4'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $t5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Button*carts.q_Button) AS t5'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $t6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Patch*carts.q_Patch) AS t6'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                         $t7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                         ->select(DB::raw('sum(pricings.Zipper*carts.q_Zipper) AS t7'))
                         ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();

                         $ttotal =  $t1->t1 + $t2->t2 + $t3->t3 + $t4->t4 + $t5->t5 + $t6->t6 + $t7->t7;
                       }

                     $voucher = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('voucher');

                     $subtotal = $waftotal + $dctotal + $ttotal;
                       if($voucher[0] == "summer15")
                       { $voucheroff = 15;  }
                       else { $voucheroff = 0;}
                       $subsubtotal = $waftotal + $dctotal + $ttotal - $voucheroff;

                       if($subtotal < 30)
                       {   $delivery = 4.99; }
                       else { $delivery = 0; }

                       $finaltotal = $subtotal + $delivery;
                       $billamount = $finaltotal * 100;


   \Stripe\Stripe::setApiKey("sk_test_uWBONOY1q6IySSReANhknbcO");
   $token = request()->stripeToken;
   $charge = \Stripe\Charge::create([
       'amount' => $billamount,
       'currency' => 'usd',
       'description' => 'Payment for order to easywash',
       'source' => $token,
   ]);

   $order = new Order;
   $order->user_id=auth()->id();
   $order->service_id= $service_id;
   $order->sp_id=$sp_id;
   $order->cart_id=$cart_id;
   $order->finaltotal=$finaltotal;
   $order->save();


$id = Auth::user()->id;
$email = Auth::user()->email;
$title = "Order Confirmation";

$data = array(
  'email' => "USER@EASYWSH.COM",
);


   Mail::send('emails.orderconfirmation', ['title' => $title,
    'finaltotal'=> $finaltotal,
    'service_id' => $service_id,
    'cart_id' => $cart_id,

  ],
   function ($message) use ($data)
          {           $message->from('info@easywash.com', 'Easywash');
                       $message->to($data['email']);
          });

Sp::find($sp_id)->notify(new OrderSP);
User::find(auth()->id())->notify(new OrderUser);

return redirect()->route('user.home')->with('status', 'Your order has been places successfully. Please check your email to view details.');
   }

    public function orders(Request $request,$sp_id, $service_id)
    {
      $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
      $drycleaning = drycleaning::all();
      $tailoring = tailoring::all();
      $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
      $avg_rating = round($rating,2);
      $carts = DB::table('carts')->where('carts.user_id', '=' , auth()->id())->orderBy('id', 'desc')->paginate(10);;
      $currentuserid = Auth::user()->id;
      // $orders = DB::table('orders')->where('orders.service_id', '=', $service_id)


      // dd($request->all());
      return view('user.orders')->with('carts', $carts)->with('tailoring', $tailoring)->with('drycleaning', $drycleaning)->with('avg_rating', $avg_rating)->with('services', $services)->with('categories', Category::all())->with('$workingday', Workingday::all());

    }

    public function orderdetails(Request $request,$sp_id, $service_id, $cart_id)
    {
      $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
      $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
      $avg_rating = round($rating,2);
      $carts = DB::table('carts')->where('carts.user_id', '=' , auth()->id())->where('carts.id', '=', $cart_id)->get();
      $currentuserid = Auth::user()->id;
      $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
      $status = DB::table('statuses')->where('statuses.cart_id', $cart_id)->orderBy('created_at', 'desc')->first();
      $drycleaning = drycleaning::whereHas('carts',
       function($query) use($cart_id) {
          $query->where('carts.id', $cart_id);
      })->get();

      $tailoring = tailoring::whereHas('carts',
       function($query) use($cart_id) {
          $query->where('carts.id', $cart_id);
      })->get();

      $categories = Category::whereHas('services',
       function($query) use($service_id) {
          $query->where('services.id', $service_id);
      })->get();

      $workingdays = Workingday::whereHas('services',
       function($query) use($service_id) {
          $query->where('services.id', $service_id);
      })->get();

                      $waf = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('washandfold');

                      if( $waf[0] == "none" )
                      { $waftotal=0; }
                      else {
                        $waf1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Regular_Laundry*carts.q_Regular_Laundry) AS waf1'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                          $waf2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Mattress_Duvet_Cover*carts.q_Bedding_Mattress_Duvet_Cover) AS waf2'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                          $waf3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Comforter_laundry*carts.q_Bedding_Comforter_laundry) AS waf3'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                          $waf4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Blanket_Throw*carts.q_Bedding_Blanket_Throw) AS waf4'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                          $waf5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Pillow_laundry*carts.q_Bedding_Pillow_laundry) AS waf5'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                          $waf6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bath_Mat_laundry*carts.q_Bath_Mat_laundry) AS waf6'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                          $waf7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Every_Hang_Dry_Item*carts.q_Every_Hang_Dry_Item) AS waf7'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $waftotal = $waf1->waf1 + $waf2->waf2 + $waf3->waf3 + $waf4->waf4 + $waf5->waf5 + $waf6->waf6 + $waf7->waf7 ;
                      }

                      $dc = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('dryclean');

                      if( $dc[0] == "none" )
                      { $dctotal=0; }
                      else {
                        $dc1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Dress*carts.q_Dress) AS dc1'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Shirt*carts.q_Shirt) AS dc2'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Sweater*carts.q_Sweater) AS dc3'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Dress_Childrens*carts.q_Dress_Childrens) AS dc4'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Skirt*carts.q_Skirt) AS dc5'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Tie*carts.q_Tie) AS dc6'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Shorts*carts.q_Shorts) AS dc7'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc8 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Jumpsuit*carts.q_Jumpsuit) AS dc8'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc9 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Gown*carts.q_Gown) AS dc9'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc10 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Mittens*carts.q_Mittens) AS dc10'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc11 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Leggings*carts.q_Leggings) AS dc11'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc12 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bath_Mat_dry_clean*carts.q_Bath_Mat_dry_clean) AS dc12'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc13 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Jacket_Down*carts.q_Jacket_Down) AS dc13'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc14 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Nightgown*carts.q_Nightgown) AS dc14'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc15 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Cummerbund*carts.q_Cummerbund) AS dc15'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc16 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bathing_suit_one_piece*carts.q_Bathing_suit_one_piece) AS dc16'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc17 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bathing_suit_Bottom*carts.q_Bathing_suit_Bottom) AS dc17'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc18 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Cardigan*carts.q_Cardigan) AS dc18'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc19 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Tank_Top*carts.q_Tank_Top) AS dc19'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc20 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Shorts*carts.q_Shorts) AS dc20'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc21 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Robe*carts.q_Robe) AS dc21'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc22 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Curtains_Light*carts.q_Curtains_Light) AS dc22'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc23 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Coat_Pea_Coat*carts.q_Coat_Pea_Coat) AS dc23'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc24 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Coat_Overcoat*carts.q_Coat_Overcoat) AS dc24'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc25 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.two_Piece_Suit*carts.q_two_Piece_Suit) AS dc25'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc26 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Romper*carts.q_Romper) AS dc26'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc27 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Cushion_Cover*carts.q_Cushion_Cover) AS dc27'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc28 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Blouse*carts.q_Blouse) AS dc28'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc29 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Cocktail_Dress*carts.q_Cocktail_Dress) AS dc29'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc30 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Pants*carts.q_Pants) AS dc30'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc31 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Jeans*carts.q_Jeans) AS dc31'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc32 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Suit_Jacket*carts.q_Suit_Jacket) AS dc32'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc33 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Scarf*carts.q_Scarf) AS dc33'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc34 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Polo_Sport_Shirt*carts.q_Polo_Sport_Shirt) AS dc34'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc35 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Vest*carts.q_Vest) AS dc35'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc36 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Gloves*carts.q_Gloves) AS dc36'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc37 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Shawl*carts.q_Shawl) AS dc37'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc38 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Napkins*carts.q_Napkins) AS dc38'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc39 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Lab_Coat*carts.q_Lab_Coat) AS dc39'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc40 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Sweatshirt*carts.q_Sweatshirt) AS dc40'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc41 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Overalls*carts.q_Overalls) AS dc41'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc42 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Tuxedo*carts.q_Tuxedo) AS dc42'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc43 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Jersey*carts.q_Jersey) AS dc43'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc44 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Hoodie*carts.q_Hoodie) AS dc44'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc45 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bra*carts.q_Bra) AS dc45'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc46 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Belt*carts.q_Belt) AS dc46'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc47 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Jacket*carts.q_Jacket) AS dc47'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc48 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Coat*carts.q_Coat) AS dc48'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc49 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Coat_3_4_Coat*carts.q_Coat_3_4_Coat) AS dc49'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc50 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Coat_Down*carts.q_Coat_Down) AS dc50'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc51 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.two_Piece_Skirt_Suit*carts.q_two_Piece_Skirt_Suit) AS dc51'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc52 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Pillow_Case*carts.q_Bedding_Pillow_Case) AS dc52'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc53 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Blanket*carts.q_Bedding_Blanket) AS dc53'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc54 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Bed_Sheet*carts.q_Bedding_Bed_Sheet) AS dc54'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc55 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Pillow_dry_clean*carts.q_Bedding_Pillow_dry_clean) AS dc55'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc56 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bathing_suit_Top*carts.q_Bathing_suit_Top) AS dc56'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc57 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Down_Comforter*carts.q_Bedding_Down_Comforter) AS dc57'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $dc58 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Bedding_Comforter_dry_clean*carts.q_Bedding_Comforter_dry_clean) AS dc58'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();

                        $dctotal = $dc1 ->dc1  + $dc2 ->dc2  + $dc3 ->dc3  + $dc4 ->dc4  + $dc5 ->dc5  + $dc6 ->dc6  + $dc7 ->dc7  +
                         $dc8 ->dc8  + $dc9 ->dc9  + $dc10->dc10 + $dc11->dc11 + $dc12->dc12 + $dc13->dc13 + $dc14->dc14 + $dc15->dc15 +
                         $dc16->dc16 + $dc17->dc17 + $dc18->dc18 + $dc19->dc19 + $dc20->dc20 + $dc21->dc21 + $dc22->dc22 + $dc23->dc23 +
                         $dc24->dc24 + $dc25->dc25 + $dc26->dc26 + $dc27->dc27 + $dc28->dc28 + $dc29->dc29 + $dc30->dc30 + $dc31->dc31 +
                         $dc32->dc32 + $dc33->dc33 + $dc34->dc34 + $dc35->dc35 + $dc36->dc36 + $dc37->dc37 + $dc38->dc38 + $dc39->dc39 +
                         $dc40->dc40 + $dc41->dc41 + $dc42->dc42 + $dc43->dc43 + $dc44->dc44 + $dc45->dc45 + $dc46->dc46 + $dc47->dc47 +
                         $dc48->dc48 + $dc49->dc49 + $dc50->dc50 + $dc51->dc51 + $dc52->dc52 + $dc53->dc53 + $dc54->dc54 + $dc55->dc55 +
                         $dc56->dc56 + $dc57->dc57 + $dc58->dc58;
                      }

                      $t = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('tailoring');

                      if( $t[0] == "none" )
                      { $ttotal=0; }
                      else {

                        $t1 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Hemming*carts.q_Hemming) AS t1'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $t2 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Hemming_Pant*carts.q_Hemming_Pant) AS t2'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $t3 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Hemming_Sleeve*carts.q_Hemming_Sleeve) AS t3'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $t4 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Taper*carts.q_Taper) AS t4'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $t5 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Button*carts.q_Button) AS t5'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $t6 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Patch*carts.q_Patch) AS t6'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();
                        $t7 = DB::table('pricings')->join('carts', 'carts.sp_id', '=', 'pricings.sp_id')
                        ->select(DB::raw('sum(pricings.Zipper*carts.q_Zipper) AS t7'))
                        ->where('pricings.sp_id', '=', $sp_id)->where('carts.id', '=' , $cart_id)->first();

                        $ttotal =  $t1->t1 + $t2->t2 + $t3->t3 + $t4->t4 + $t5->t5 + $t6->t6 + $t7->t7;
                      }

                    $voucher = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('voucher');

                    $subtotal = $waftotal + $dctotal + $ttotal;

                      if($voucher[0] == "summer15")
                      { $voucheroff = 15;  }
                      else { $voucheroff = 0;}

                      if($subtotal >= $voucheroff)
                      { $subsubtotal = $subtotal - $voucheroff; }
                      else { $subsubtotal = 0;}



                      if($subsubtotal < 30)
                      {   $delivery = 4.99; }
                      else { $delivery = 0; }

                      $finaltotal = $subsubtotal + $delivery;

                      $billamount = $finaltotal * 100;
      // dd($request->all());
      return view('user.orderdetails')
      ->with('tailoring', $tailoring)
      ->with('prices', $prices)
      ->with('carts', $carts)
      ->with('tailoring', $tailoring)
      ->with('drycleaning', $drycleaning)
      ->with('avg_rating', $avg_rating)
      ->with('services', $services)
      ->with('subsubtotal', $subsubtotal)
      ->with('voucheroff', $voucheroff)
      ->with('subtotal', $subtotal)
      ->with('delivery', $delivery)
      ->with('finaltotal', $finaltotal)
      ->with('billamount', $billamount)
      ->with('categories', $categories)
      ->with('workingdays', $workingdays)
      ->with('status', $status);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }
}
