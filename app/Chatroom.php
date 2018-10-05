<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
  protected $fillable = ['id'];
  public function messages(){
    return $this->hasMany('App\Message');
  }
}
