<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\pricings;
use App\service;
use App\Category;
use App\Workingday;
use App\Schedule;
use App\Comment;
use App\User;
use App\Sp;
use App\privatemessage;
use App\Notifications\NotifySP;
use App\Notifications\CommentSP;
use App\Notifications\ProfileUser;

use Illuminate\Notifications\Notification;
// use Request;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $services = DB::table('services')->paginate(6);
      return view('user.home')->with('services', $services)->with('categories', Category::all())->with('$workingday', Workingday::all());
    }



    public function profile($user_id)
    {
        $users = DB::table('users')->where('users.id', '=' , '$user_id')->first();
        return view('user.profile')->with('users', $users)->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
    }

    public function profileupdate(Request $request,$user_id)
    {
      $user = User::findOrFail(Auth::user()->id);
      $user->address = $request->get('address');
      $user->city = $request->get('city');
      $user->state = $request->get('state');
      $user->zipcode = $request->get('zipcode');
      $user->save();
      $users = DB::table('users')->where('users.id', '=' , 'Auth::user()->id')->first();

      User::find($user_id)->notify(new ProfileUser);

      return redirect()->route('user.home.profile', [Auth::user()->id])->with('users', $users)->withSuccess('Well done. Profile details updated successfully.');
    }



    public function categoryindex($cid)
    {
      $services = Service::whereHas('categories',
       function($query) use($cid) {
          $query->where('categories.id', $cid);
      })->paginate(6);
      return view('user.home')->with('services', $services)->with('categories', Category::all())->with('$workingday', Workingday::all());
   }

  //  public function workingdayindex($id)
  //  {
  //    $services = Service::whereHas('workingdays',
  //     function($query) use($id) {
  //        $query->where('workingdays.id', $id);
  //    })->paginate(6);
  //    return view('user.home')->with('services', $services);
  // }


   public function zipcodeindex($zipcode)
   {

  $services = DB::table('services')->where('zipcode', '=' , $zipcode)->get();
 return view('user.home')
 ->with('services', $services)
 ->with('categories', Category::all())
 ->with('$workingday', Workingday::all());

  }


    public function details(Request $request,$sp_id, $service_id)
    {

      $categories = Category::whereHas('services',
       function($query) use($service_id) {
          $query->where('services.id', $service_id);
      })->get();

      $workingdays = Workingday::whereHas('services',
       function($query) use($service_id) {
          $query->where('services.id', $service_id);
      })->get();


$services = DB::table('services')->where('services.id', '=' , $service_id)->get();
$prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
$comments = DB::table('comments')->where('comments.service_id', '=' , $service_id )->get();

$rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
$avg_rating = round($rating,2);

return view('user.details')
->with('avg_rating', $avg_rating)
->with('prices', $prices)
->with('comments', $comments)
->with('services', $services)
->with('categories', $categories)
->with('workingdays', $workingdays);


    }





    public function store(Request $request,$sp_id, $service_id)
    {
      $this->validate($request, [
        'dos' => 'required'
      ]);

      $schedule = Schedule::create([
      'dos' => $request->dos,
      ]);


      $schedule->user_id=auth()->id();
      $schedule->sp_id= $sp_id;
      $schedule->service_id= $service_id;
      $schedule->save();

      $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
      $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
   //  $services= DB::table('services')->where('services.sp_id', '=', 'auth()->id()')->get();
   // $prices = DB::table('prices')->get();
   // dd($request->all());

Session::flash('success','Scheduled successfully');
return view('user.home.details')->with('prices', $prices)->with('services', $services)->with('categories', Category::all())->with('workingday', Workingday::all());
    }

    public function comment(Request $request,$sp_id, $service_id)
    {
      $comment = Comment::create([
      'comment' => $request->comment,
      'rating' => $request->rating,
      ]);

      $loggedin_username = Auth::user()->name;
      $comment->user_id=auth()->id();
      $comment->user_name = $loggedin_username;
      $comment->service_id= $service_id;
      $comment->sp_id=$sp_id;
      $comment->save();

      $categories = Category::whereHas('services',
       function($query) use($service_id) {
          $query->where('services.id', $service_id);
      })->get();

      $workingdays = Workingday::whereHas('services',
       function($query) use($service_id) {
          $query->where('services.id', $service_id);
      })->get();


$services = DB::table('services')->where('services.id', '=' , $service_id)->get();
$prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
$comments = DB::table('comments')->where('comments.service_id', '=' , $service_id )->get();

$rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
$avg_rating = round($rating,2);


Sp::find($sp_id)->notify(new CommentSP);

      Session::flash('success','Scheduled successfully');
      return view('user.details')
      ->with('prices', $prices)
      ->with('comments', $comments)
      ->with('services', $services)
      ->with('categories', $categories)
      ->with('avg_rating', $avg_rating)
      ->with('workingdays', $workingdays);
    }

public function showcart()

{
return view('user.home.ordercart');
}

public function contact(Request $request,$sp_id, $service_id)
{
  $this->validate($request,[
           'name'=>'required',
           'email'=>'required',
           'phone'=>'required',
       'message'=>'required',
       'subject'=>'required',
        ]);

  $privatemessages = privatemessage::create([
    'name'  => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'subject' => $request->subject,
    'message' => $request->message,
  ]);

  $privatemessages->user_id=auth()->id();
  $privatemessages->service_id= $service_id;
  $privatemessages->sp_id=$sp_id;
  $privatemessages->save();

  $categories = Category::whereHas('services',
   function($query) use($service_id) {
      $query->where('services.id', $service_id);
  })->get();

  $workingdays = Workingday::whereHas('services',
   function($query) use($service_id) {
      $query->where('services.id', $service_id);
  })->get();


  $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
  $prices = DB::table('pricings')->where('pricings.sp_id', '=', $sp_id)->get();
  $comments = DB::table('comments')->where('comments.service_id', '=' , $service_id )->get();

  $rating = DB::table('comments')->where('comments.service_id', '=' , $service_id )->avg('rating');
  $avg_rating = round($rating,2);

  Sp::find($sp_id)->notify(new NotifySP);

  // use Illuminate\Notifications\Notification;
  // use App\Notifications\NotifySP;

  return view('user.details')
  ->with('avg_rating', $avg_rating)
  ->with('prices', $prices)
  ->with('comments', $comments)
  ->with('services', $services)
  ->with('categories', $categories)
  ->with('workingdays', $workingdays);

}


}
