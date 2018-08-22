<?php

namespace App\Http\Controllers;
use App\Category;
use App\service;
use App\Sp;
use App\Workingday;
use App\Comment;
use Session;
use Auth;
use DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
         $this->middleware('auth:sp');
     }
//______________________________________________________________________________________________________________________________//
    // public function index()
    // {
    //   $services = DB::table('services')->where('user_id', auth()->id())->get();
    //   return view('sp.services.index')->with('services', Service::all())->with('categories', Category::all())->with('$workingday', Workingday::all());
    // }

  public function index()
  {


    $rating = DB::table('comments')->where('comments.service_id', '=' , 'services.service_id' )->avg('rating');
    $avg_rating = round($rating,2);

    $services = DB::table('services')->where('sp_id',auth()->id())->whereNull('deleted_at')->get();



    return view('sp.services.index')->with('avg_rating', $avg_rating)->with('services', $services)->with('categories', Category::all())->with('$workingday', Workingday::all());

  }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

//______________________________________________________________________________________________________________________________//
    public function create()
    {
      $categories = Category::all();
      return view('sp.services.create')->with('categories', $categories)->with('workingday', Workingday::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//______________________________________________________________________________________________________________________________//

    public function store(Request $request)
    {
      $currentuserid = Auth::user()->id;
          $this->validate($request, [
          'name' => 'required|max:255',
          'address' => 'required|max:255',
          'city' => 'required|max:255',
          'state' => 'required|max:255',
          'zipcode' => 'required|integer|digits:5',
          //'featured' => 'image|nullable',
          'category_id' => 'required',
          'workingday' => 'required',
          'content' => 'required|nullable'
          ]);

        if($request->hasfile('featured'))
            {
              $featured = $request->featured;
              $featured_new_name = time().$featured->getClientOriginalName();
              $featured->move('uploads/services',$featured_new_name);
            }
        else {      }

        if($request->hasfile('featured'))
          {
            $service = Service::create([
            'name' => $request->name,
            'content' => $request->content,
            'featured' =>'/uploads/services/'.$featured_new_name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
          ]);
          }

          else
          {
            $service = Service::create([
            'name' => $request->name,
            'content' => $request->content,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            ]);
          }

          $service->workingdays()->attach($request->workingday);
          $service->categories()->attach($request->category_id);
          $service->sp_id=auth()->id();
          $service->save();

          Session::flash('success','Well done! You successfully created a service.');

          return view('sp.services.create')->with('categories', Category::all())->with('workingday', Workingday::all())->withSuccess('IT WORKS!');
        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//______________________________________________________________________________________________________________________________//

    public function show($id)
    {
        $service = Service::find($id);
        return view('sp.services.info')->with('service', $service)->with('categories', Category::all())->with('workingday', Workingday::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//______________________________________________________________________________________________________________________________//

    public function edit($id)
    {
        $service = Service::find($id);

        return view('sp.services.edit')->with('service', $service)->with('categories', Category::all())->with('workingday', Workingday::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  //______________________________________________________________________________________________________________________________//


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'address' => 'required|max:255',
        'city' => 'required|max:255',
        'state' => 'required|max:255',
        'zipcode' => 'required|integer|digits:5',
        'category_id' => 'required',
        'content' => 'nullable',
        'workingday' => 'nullable'

      ]);

      $service = Service::find($id);
      if($request->hasfile('featured'))
    {
      $featured = $request->featured;
      $featured_new_name = time().$featured->getClientOriginalName();
      $featured->move('uploads/services', $featured_new_name);
      $service->featured = 'uploads/services/'.$featured_new_name;
    }

    $service->name = $request->name;
    $service->address = $request->address;
    $service->city = $request->city;
    $service->state = $request->state;
    $service->zipcode = $request->zipcode;
    $service->category_id = $request->category_id;
    $service->workingday = $request->workingday;
    $service->content = $request->content;

    $service->categories()->sync($request->category_id);
    $service->workingdays()->sync($request->workingday);

    Session::flash('success','Service details updated successfully.');
    return redirect()->route('sp.services.index')->withSuccess('Well done. Service details updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//______________________________________________________________________________________________________________________________//


    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        Session::flash('success','Service trashed successfully');
        return redirect()->route('sp.services.index')->withSuccess('Well done. Service deleted successfully.');
    }

//______________________________________________________________________________________________________________________________//

    public function trashed()
    {
      $services = Service::onlyTrashed();
      return view('admin.services.trashed')->with('services',$services )->withSuccess('IT WORKS!');
    }


}
