<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\Workingday;
class WorkingdaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.workingdays.index')->with('workingdays', Workingday::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workingdays.create');
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

$workingday = new Workingday;

$workingday->name = $request->name;
$workingday->save();

return redirect()->route('admin.workingdays.index');
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
        $workingday = Workingday::find($id);

        return view('admin.workingdays.edit')->with('workingday', $workingday);
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
      $workingday = Workingday::find($id);

      $workingday->name = $request->name;

      $workingday->save();
      Session::flash('success', 'You successfully updated workingday route');
      return redirect()->route('admin.workingdays.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $workingday = Workingday::find($id);

      $workingday->delete();
      Session::flash('success', 'You successfully deleted workingday route');
      return redirect()->route('admin.workingdays.index');

    }
}
