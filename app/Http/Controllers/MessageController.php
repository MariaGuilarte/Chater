<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Chatroom;
use App\Http\Resources\MessagesResource;
use App\Events\CreatedMessage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessage;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
      return view('messages.index');
    }

    public function create(){
      
    }

    public function getConversation(Chatroom $chatroom){
      $messages = $chatroom->messages;
      return MessagesResource::collection($messages);
    }
    
    public function store(Request $request){
      $message = new Message([
        'body' => $request->body,
        'chatroom_id' => Chatroom::findOrfail( $request->chatroom_id )->id,
        'sender' => Auth::id(),
        'receiver' => User::findOrfail($request->receiver)->id
      ]);
      
      if( $message->save() ){
        event( new CreatedMessage($message) );
      }
    }

    public function show(Message $message){
      
    }

    public function edit(Message $message){
        //
    }

    public function update(Request $request, Message $message){
        //
    }

    public function destroy(Message $message){
        //
    }
}
