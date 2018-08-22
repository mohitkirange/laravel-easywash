<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sp;
use DB;
use View;
use Auth;

use App\Order;
use App\Service;
use App\privatemessage;

class SpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


        $this->middleware('auth:sp');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function profile()
     {
         $sp = DB::table('sps')->where('sps.id', '=' , Auth::id())->first();
       return view('sp.profile.index')
       ->with('sp', $sp);
     }

     public function profileupdate(Request $request)
     {

       $sp = Sp::findOrFail(Auth::user()->id);
       $sp->name = $request->get('name');
       $sp->address = $request->get('address');
       $sp->fname = $request->get('fname');
       $sp->lname = $request->get('lname');
       $sp->job_title = $request->get('job_title');

       $sp->save();

       $sps = DB::table('sps')->where('sps.id', '=' , Auth::id())->first();
     return view('sp.profile.index')->with('sp', $sps);

     }

public function message()
{  $messages = DB::table('privatemessages')->where('privatemessages.sp_id', '=', Auth::id())->get();
  return view('sp.messages.index')->with('messages', $messages);
}

    public function index()
    {
      $comments = DB::table('comments')->where('comments.sp_id', '=', Auth::id() )->count();
      $services = DB::table('services')->where('services.sp_id','=', Auth::id() )->count();
      $orders=DB::table('orders')->where('orders.sp_id', '=' , Auth::id() )->count();
      $amount = DB::table('orders')->where('orders.sp_id', '=' , Auth::id() )->sum('finaltotal');
      $amounts = DB::table('orders')->where('orders.sp_id', '=' , Auth::id() )->pluck('finaltotal');
      $paymentids = DB::table('orders')->where('orders.sp_id', '=' , Auth::id() )->pluck('id');

      $allorders=DB::table('orders')->where('orders.sp_id', '=' , Auth::id() )->get();



        return view('sp')
        ->with('comments', $comments)
        ->with('services', $services)
        ->with('orders', $orders)
        ->with('amounts', $amounts)
        ->with('paymentids', $paymentids)
        ->with('allorders', $allorders)
        ->with('amount', $amount);
    }

    public  function payments()
    {
      $orders=DB::table('orders')->where('orders.sp_id', '=' , Auth::id() )->get();
      return view('sp/payments/index')->with('orders', $orders);
    }

    public function showdata()
    {

      $sps= Sp::all();

      return view('sp/spprofile')->with('sps',$sps);


    }


}
