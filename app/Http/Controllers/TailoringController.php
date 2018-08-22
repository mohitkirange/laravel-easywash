<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\tailoring;
class TailoringController extends Controller
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
          return view('admin.items.tailoring.index')->with('tailoring', tailoring::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.items.tailoring.create');
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

      $tailoring = new tailoring;

      $tailoring->name = $request->name;
      $tailoring->save();

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
      $tailoring = tailoring::find($id);

      return view('admin.items.tailoring.edit')->with('tailoring', $tailoring);
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
      $tailoring = tailoring::find($id);

      $tailoring->name = $request->name;

      $tailoring->save();
      Session::flash('success', 'You successfully updated tailoring item');
      return redirect()->route('admin.items.tailoring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tailoring = tailoring::find($id);

        $tailoring->delete();
        Session::flash('success', 'You successfully deleted tailoring item');
        return redirect()->route('admin.items.tailoring.index');

    }
}
