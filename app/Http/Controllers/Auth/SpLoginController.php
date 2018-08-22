<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SpLoginController extends Controller
{


  public function __construct()
  {
    $this->middleware('guest:sp', ['except' => ['splogout']]);

  }


  public function showLoginForm()
  {
    return view('auth.sp-login');
  }


  public function login(Request $request)
  {
    $this->validate($request,[
    'email' => 'required|email',
    'password' => 'required|min:6'
    ]);

    if (Auth::guard('sp')->attempt(['email'=>$request->email, 'password'=> $request->password], $request->remember))
    {
      return redirect()->intended(route('sp.dashboard'));
     }
      return redirect()->back()->withInput($request->only('email','remember'));
  }


    public function splogout()
        {
            Auth::guard('sp')->logout();
            return redirect('/');
        }

}
