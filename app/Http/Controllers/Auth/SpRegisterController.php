<?php

namespace App\Http\Controllers\Auth;
use App\Sp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Mail;



class SpRegisterController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest:sp', ['except' => ['logout']]);

  }
  public function showRegisterForm()
  {
    return view('auth.sp-register');
  }



  public function store()
      {
          $this->validate(request(), [
              'name' => 'required|string|max:255',
              'address' => 'required|string|max:255',
              'fname' => 'required|string|max:255',
              'lname' => 'required|string|max:255',
              'job_title' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:sps',
              'password' => 'required|string|min:6|confirmed',

          ]);

          $sp = Sp::create(request(['name', 'email', 'password' , 'address', 'fname', 'lname', 'job_title' ]));

          auth('sp')->login($sp);

          return redirect()->to('/sp');
      }

}
