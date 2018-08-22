<?php

namespace App\Http\Controllers;

use App\preferences;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Notifications\Preferencesupdated;
use Illuminate\Notifications\Notification;

class PreferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {

      $preferences = DB::table('preferences')->where('preferences.user_id',auth()->id())->get();
      return view('user.preferences')->with('preferences', $preferences)->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');

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
    public function store(Request $request,$user_id)
    {

        $preferences = new preferences;

        $preferences->detergent= $request->detergent;
        $preferences->fabricsoftener= $request->fabricsoftener;
        $preferences->starch= $request->starch;

        $preferences->user_id=auth()->id();
        $preferences->save();
        User::find(auth()->id())->notify(new Preferencesupdated);
          return redirect()->route('user.home.preferences', [Auth::user()->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\preferences  $preferences
     * @return \Illuminate\Http\Response
     */
    public function show(preferences $preferences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\preferences  $preferences
     * @return \Illuminate\Http\Response
     */
    public function edit(preferences $preferences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\preferences  $preferences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, preferences $preferences,$user_id)
    {
      $preferences = preferences::where('user_id', $user_id)
      ->update([
         'detergent'=> request()->detergent,
         'fabricsoftener'=> request()->fabricsoftener,
         'starch'=> request()->starch,
      ]);


     // $preferences = preferences::where('user_id', $user_id);
     //
     //  // $preferences = DB::table('preferences')->where('preferences.user_id','=', $user_id)->first();
     //
     //  $preferences->detergent= request()->detergent;
     //  $preferences->fabricsoftener= request()->fabricsoftener;
     //  $preferences->starch= request()->starch;
     //  // $preferences->save();
     User::find(auth()->id())->notify(new Preferencesupdated);
        return redirect()->route('user.home.preferences', [Auth::user()->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\preferences  $preferences
     * @return \Illuminate\Http\Response
     */
    public function destroy(preferences $preferences)
    {
        //
    }
}
