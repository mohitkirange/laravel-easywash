<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\drycleaning;
class DrycleanController extends Controller
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
        return view('admin.items.dryclean.index')->with('drycleaning', drycleaning::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.items.dryclean.create');
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

      $drycleaning = new drycleaning;

      $drycleaning->name = $request->name;
      $drycleaning->save();

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
      $drycleaning = drycleaning::find($id);

      return view('admin.items.dryclean.edit')->with('drycleaning', $drycleaning);
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
      $drycleaning = drycleaning::find($id);

      $drycleaning->name = $request->name;

      $drycleaning->save();
      Session::flash('success', 'You successfully updated dry cleaning route');
      return redirect()->route('admin.items.dryclean.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $drycleaning = drycleaning::find($id);

      $drycleaning->delete();
      Session::flash('success', 'You successfully deleted dry cleaning item');
      return redirect()->route('admin.items.dryclean.index');

    }
}
