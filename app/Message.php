<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = ['body', 'sender', 'receiver', 'chatroom_id'];
  
  public function user(){
    return $this->belongsTo('App\User');
  }
  
  public function chatroom(){
    return $this->belongsTo('App\Chatroom');
  }
}
