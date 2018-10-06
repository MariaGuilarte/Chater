<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Http\Resources\MessagesResource;

class CreatedMessage
{
  use Dispatchable, InteractsWithSockets, SerializesModels;
  
  public $message;
  
  public function __construct(MessagesResource $message){
    $this->message = $message; 
  }

  public function broadcastOn(){
    return new PrivateChannel('chatroom.' . $message->chatroom_id);
  }
}