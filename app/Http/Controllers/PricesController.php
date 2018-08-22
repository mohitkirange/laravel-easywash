<?php

namespace App\Http\Controllers;
use App\Sp;
use Session;
use Auth;
use DB;
use App\Price;
use Illuminate\Http\Request;

class PricesController extends Controller
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

  $prices = DB::table('prices')->where('sp_id',auth()->id())->get();
      return view('sp.prices.index')->with('prices', $prices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $prices = DB::table('prices')->where('sp_id',auth()->id())->get();
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
        // dd($request->all());

        // $this->validate($request, [
        //   'price_laundry' => 'nullable',
        //   'price_shirt' => 'nullable'
        // ]);

        $price = new Price;

$price ->price_laundry = $request->price_laundry;
$price->price_shirt = $request->price_shirt ;
$price->price_pant = $request->price_pant ;
$price->price_blouse = $request->price_blouse ;
$price->price_sweater = $request->price_sweater ;
$price->price_dress = $request->price_dress ;
$price->price_jacket = $request->price_jacket ;
$price->price_suit = $request->price_suit ;
$price->price_skirt = $request->price_skirt ;
$price->price_scarf = $request->price_scarf ;
$price->price_tie = $request->price_tie ;
$price->price_shorts = $request->price_shorts ;
$price->price_coat = $request->price_coat ;
$price->price_shawl = $request->price_shawl ;
$price->price_tunic = $request->price_tunic ;
$price->price_bra = $request->price_bra ;
$price->price_undie = $request->price_undie ;

$price->price_comforter = $request->price_comforter ;
$price->price_blanket = $request->price_blanket ;
$price->price_pillow = $request->price_pillow ;
$price->price_pillowcase = $request->price_pillowcase ;
$price->price_curtain = $request->price_curtain ;
$price->price_duvercover = $request->price_duvercover ;
$price->price_rug = $request->price_rug ;
$price->price_sheets = $request->price_sheets ;

$price->price_hemming = $request->price_hemming ;
$price->price_hemmingpants = $request->price_hemmingpants ;
$price->price_hemmingsleeve = $request->price_hemmingsleeve ;
$price->price_taper = $request->price_taper ;
$price->price_button = $request->price_button ;
$price->price_patch = $request->price_patch ;
$price->price_zipper = $request->price_zipper ;

$price->price_content = $request->price_content ;

        $price->sp_id=auth()->id();
        $price->save();

        return redirect()->route('sp.prices.index');
        Session::flash('success','Price table saved');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $price = Price::find($id);
      return view('sp.prices.edit')->with('price', $price);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $price = Price::find($id);

      $price ->price_laundry = $request->price_laundry;
      $price->price_shirt = $request->price_shirt ;
      $price->price_pant = $request->price_pant ;
      $price->price_blouse = $request->price_blouse ;
      $price->price_sweater = $request->price_sweater ;
      $price->price_dress = $request->price_dress ;
      $price->price_jacket = $request->price_jacket ;
      $price->price_suit = $request->price_suit ;
      $price->price_skirt = $request->price_skirt ;
      $price->price_scarf = $request->price_scarf ;
      $price->price_tie = $request->price_tie ;
      $price->price_shorts = $request->price_shorts ;
      $price->price_coat = $request->price_coat ;
      $price->price_shawl = $request->price_shawl ;
      $price->price_tunic = $request->price_tunic ;
      $price->price_bra = $request->price_bra ;
      $price->price_undie = $request->price_undie ;

      $price->price_comforter = $request->price_comforter ;
      $price->price_blanket = $request->price_blanket ;
      $price->price_pillow = $request->price_pillow ;
      $price->price_pillowcase = $request->price_pillowcase ;
      $price->price_curtain = $request->price_curtain ;
      $price->price_duvercover = $request->price_duvercover ;
      $price->price_rug = $request->price_rug ;
      $price->price_sheets = $request->price_sheets ;

      $price->price_hemming = $request->price_hemming ;
      $price->price_hemmingpants = $request->price_hemmingpants ;
      $price->price_hemmingsleeve = $request->price_hemmingsleeve ;
      $price->price_taper = $request->price_taper ;
      $price->price_button = $request->price_button ;
      $price->price_patch = $request->price_patch ;
      $price->price_zipper = $request->price_zipper ;

      $price->price_content = $request->price_content ;
      $price->save();


      Session::flash('success', 'You successfully updated prices');
      return redirect()->route('sp.prices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
