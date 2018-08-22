<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Session;
use App\User;
use Auth;
use Illuminate\Notifications\Notification;
use App\Notifications\MessageSent;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function postContact(Request $request)
    {
$this-> validate($request, [
'email' => 'required|email',
'subject' => 'min:3',
'message' => 'min:10' ]);

$data = array(
  'email' => $request->email,
  'name'=> $request->name,
  'phone' => $request->phone,
  'subject' => $request->subject,
  'bmessage' => $request->message,
);

Mail::send('emails.contact', $data, function($message) use ($data) {
  $message->from($data['email']);
  $message->to('admin@easywash.io');
  $message->subject($data['subject']);

});

if($user = Auth::user())
{
    // do what you need to do
    User::find(Auth::user()->id)->notify(new MessageSent);
    // User::find($sp_id)->notify(new NotifySP);
}




 return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
