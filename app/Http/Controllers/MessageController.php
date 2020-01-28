<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //get logged in user
        $user = Auth::user();
        //return $user;

        //validates the body of the request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'receiver_name' => 'required',
        ]);

        //get the receiver info
        $receiver = User::where('name', $request->input('receiver_name'))->first();

        //Checks validation failure
        if ($validator->fails()) {
            //Status code 400 means bad request
            return response($validator->errors())->setStatusCode(400);
        }

        $message = new Message;
        $message->title = $request->input('title');
        $message->body = $request->input('body');
        $message->receiver_id = $receiver->id; //receiver ID
        $message->user_id = $user->id;  //sender ID

        $message->save();

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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
