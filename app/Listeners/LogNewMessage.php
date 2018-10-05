<?php

namespace App\Listeners;

use App\Events\CreatedMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class LogNewMessage
{    
    public function __construct(){
      
    }

    public function handle(CreatedMessage $event){
      $message = $event->message;
      Storage::disk('local')->append('new_messages.txt', $message->body . ' From: ' . $message->sender . ' To: ' . $message->receiver);
    }
}
