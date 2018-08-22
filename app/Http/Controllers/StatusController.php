<?php

namespace App\Http\Controllers;

use App\status;
use Illuminate\Http\Request;

use App\Order;
use App\cart;
use App\User;
use App\Service;
use App\pricings;
use App\Category;
use App\Workingday;
use App\drycleaning;
use App\tailoring;
use App\Bill;
use Session;
use DB;


class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$cart_id,$service_id,$sp_id)
    {
      $this->validate($request,[
        'status' => 'required'
      ]);

      $status = new status;

      $status->status= $request->status;
        $status->cart_id= $cart_id;
      $status->save();
      Session::flash('success', 'You successfully updated status');

      return redirect()->route('sp.orders.index');
      ///dd($request->all());


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(status $status)
    {
        //
    }
}
