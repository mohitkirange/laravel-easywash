<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


//
// namespace App\Http\Controllers\Auth;
//
// use App\User;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;

class AdminRegisterController extends Controller
{


  public function __construct()
  {
    $this->middleware('guest:admin', ['except' => ['logout']]);

  }
  public function showRegisterForm()
  {
    return view('auth.admin-register');
  }


  public function store()
      {
          $this->validate(request(), [
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:admins',
              'password' => 'required|string|min:6'
          ]);

          $admin = Admin::create(request(['name', 'email', 'password']));

          auth('admin')->login($admin);

          return redirect()->to('/admin');
      }
  // protected function validator(array $data)
  // {
  //     return Validator::make($data, [
  //         'name' => 'required|string|max:255',
  //         'email' => 'required|string|email|max:255|unique:admins',
  //         'password' => 'required|string|min:6|confirmed',
  //     ]);
  // }
  //
  // protected function create(array $data)
  // {
  //     return Admin::create([
  //         'name' => $data['name'],
  //         'email' => $data['email'],
  //         'password' => bcrypt($data['password']),
  //     ]);
  // }
}
