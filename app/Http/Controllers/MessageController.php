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

  public function show(Chatroom $chatroom){
    return view('messages.show', ["sender_id"=>Auth::id(), "receiver_id"=>$chatroom->id, "chatroom_id"=>$chatroom->id]);
  }

  public function getConversation(Chatroom $chatroom){
    $messages = $chatroom->messages;
    return MessagesResource::collection($messages);
  }

  public function store(Request $request){
    $message = new Message([
      'body' => $request->body,
      'chatroom_id' => $request->chatroom_id,
      'sender' => Auth::id(),
      'receiver' => $request->receiver
    ]);

    if( $message->save() ){
      event( new CreatedMessage( $message ) );
      return $message;
    }
  }

  public function destroy(Message $message){

  }
}
