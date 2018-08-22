<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Comment;
use App\Price;
use App\service;
use App\Category;
use App\Workingday;
use App\Schedule;
use Session;
use App\Sp;
use App\Notifications\NotifySP;

use Illuminate\Notifications\Notification;
use App\user;


use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



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
    // public function store(Request $request)
    // {
    //     Comment::create ([
    //       'body' => requst('body'),
    //       'service_id' =>
    //     ])
    // }

    // $sp_id, $service_id


    public function store(Request $request,$sp_id, $service_id)
    {
      $comment = Comment::create([
      'comment' => $request->comment,
      'rating' => $request->rating,
      ]);

      $loggedin_username = Auth::user()->name;
      $comment->user_id=auth()->id();
      $comment->user_name = $loggedin_username;
      $comment->service_id= $service_id;
      $comment->sp_id= $sp_id;
      $comment->save();

      $services = DB::table('services')->where('services.id', '=' , $service_id)->get();
      $prices = DB::table('prices')->where('prices.sp_id', '=', $sp_id)->get();
      $comments = DB::table('comments')->where('comments.service_id', '=' , $service_id )->paginate(2);



      Session::flash('success','Scheduled successfully');
      return view('user.home.details')->with('prices', $prices)->with('comments', $comments)->with('services', $services)->with('categories', Category::all())->with('$workingday', Workingday::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
