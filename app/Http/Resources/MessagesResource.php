<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessagesResource extends JsonResource
{
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'body' => $this->body,
        'chatroom_id' => $this->chatroom_id,
        'sender' => $this->sender,
        'receiver' => $this->receiver,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at
      ];
      // return parent::toArray($request);
    }
}
