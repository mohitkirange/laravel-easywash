<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use App\cart;
use App\User;
use App\Sp;
use App\Service;
use App\pricings;
use App\Category;
use App\Workingday;
use App\drycleaning;
use App\tailoring;
use App\Bill;
use App\status;
use Session;
use DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $users = DB::table('users')->count();
      $sps = DB::table('sps')->count();
      $comments = DB::table('comments')->count();
      $services = DB::table('services')->count();
      $washandfold = DB::table('washandfolds')->count();
      $drycleaning = DB::table('drycleanings')->count();
      $tailoring = DB::table('tailorings')->count();
      $ordercount=DB::table('orders')->count();
      $orders=DB::table('orders')->orderBy('created_at', 'desc')->take(4)->get();

        return view('admin')
        ->with('users', $users)
        ->with('sps', $sps)
        ->with('comments', $comments)
        ->with('services', $services)
        ->with('washandfold', $washandfold)
        ->with('drycleaning', $drycleaning)
        ->with('tailoring', $tailoring)
        ->with('orders', $orders)
        ->with('ordercount', $ordercount);
    }

    public function users()
    {
      $users = DB::table('users')->get();
        return view('admin.users.users')->with('users', $users);
    }
    public function usersdelete($id)
    {
      $users = User::find($id);
      $users->delete();
      return redirect()->route('admin.users');
    }


    public function sps()
    {
      $sps = DB::table('sps')->get();
        return view('admin.users.sps')->with('sps', $sps);
    }
    public function spsdelete($id)
    {
      $sps = Sp::find($id);
      $sps->delete();
      return redirect()->route('admin.sps');
    }


    public function comments()
    {
      $services = DB::table('services')->whereNull('deleted_at')->get();
      $prices = DB::table('pricings')->where('sp_id',auth()->id())->get();
      return view('admin.comments.index')->with('services', $services)->with('prices', $prices);
    }
    public function commentsview($service_id)
    {
      $comments = DB::table('comments')->where('comments.service_id', '=' , $service_id )->get();
      $prices = DB::table('pricings')->where('sp_id',auth()->id())->get();
      return view('admin.comments.view')
      ->with('prices', $prices)
      ->with('comments', $comments);
    }
    public function payments()
    {
      $orders=DB::table('orders')->orderBy('created_at', 'desc')->get();
      return view('admin.payments.index')
      ->with('orders', $orders);
    }



    public function orders()
    {
      $cart = DB::table('carts')->get();
        return view('admin.orders.index')->with('cart', $cart);
    }
    public function ordersview($cart_id,$service_id, $sp_id)
    {
      $carts = DB::table('carts')->where('sp_id',auth()->id())->where('carts.id', '=', $cart_id)->get();
      $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
      $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
      $user_id = DB::table('carts')->where('carts.id', '=' , $cart_id)->pluck('user_id');
      $users = DB::table('users')->where('users.id', '=', $user_id[0])->get();

      $status = DB::table('statuses')->where('statuses.cart_id', $cart_id)->orderBy('created_at', 'desc')->first();

      $drycleaning = drycleaning::whereHas('carts',
       function($query) use($cart_id) {
          $query->where('carts.id', $cart_id);
      })->get();

      $tailoring = tailoring::whereHas('carts',
       function($query) use($cart_id) {
          $query->where('carts.id', $cart_id);
      })->get();

      $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
      $avg_rating = round($rating,2);

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

      return view('admin.orders.view')
      ->with('status', $status)
      ->with('users', $users)
      ->with('carts', $carts)
      ->with('services', $services)
      ->with('prices', $prices)
      ->with('tailoring', $tailoring)
      ->with('drycleaning', $drycleaning)
      ->with('subsubtotal', $subsubtotal)
      ->with('voucheroff', $voucheroff)
      ->with('subtotal', $subtotal)
      ->with('delivery', $delivery)
      ->with('finaltotal', $finaltotal)
      ->with('billamount', $billamount)
      ->with('prices', $prices)
      ->with('avg_rating', $avg_rating)
      ->with('categories', $categories)
      ->with('workingdays', $workingdays);
    }
}
