<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\privatemessage;
use Illuminate\Http\Request;
use App\pricings;
use App\service;
use App\Category;
use App\Workingday;
use App\Schedule;
use App\Comment;
use App\User;
use App\Sp;
use App\Notifications\NotifySP;
use Illuminate\Notifications\Notification;
use Session;
use Illuminate\Support\Facades\Input;

class PrivatemessageController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\privatemessage  $privatemessage
     * @return \Illuminate\Http\Response
     */
    public function show(privatemessage $privatemessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\privatemessage  $privatemessage
     * @return \Illuminate\Http\Response
     */
    public function edit(privatemessage $privatemessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\privatemessage  $privatemessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, privatemessage $privatemessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\privatemessage  $privatemessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(privatemessage $privatemessage)
    {
        //
    }
}
