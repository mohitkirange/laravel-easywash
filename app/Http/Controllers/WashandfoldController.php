<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\washandfold;
use Session;
class WashandfoldController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.items.washandfold.index')->with('washandfold', washandfold::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.items.washandfold.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this -> validate($request,[
        'name' => 'required'
      ]);

      $washandfold = new washandfold;

      $washandfold->name = $request->name;
      $washandfold->save();

      return redirect()->back();
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
      $washandfold = washandfold::find($id);

      return view('admin.items.washandfold.edit')->with('washandfold', $washandfold);
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
      $washandfold = washandfold::find($id);

      $washandfold->name = $request->name;

      $washandfold->save();
      Session::flash('success', 'You successfully updated washandfold item');
      return redirect()->route('admin.items.washandfold.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $washandfold = washandfold::find($id);

      $washandfold->delete();
      Session::flash('success', 'You successfully deleted washandfold item');
      return redirect()->route('admin.items.washandfold.index');

    }
}
