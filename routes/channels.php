<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chatroom.{id}', function ($user, $id){
  $chatroom = App\Chatroom::where("user_1", $user->id)->orWhere("user_2", $user->id)->get();
  if( $chatroom ){
    return true;
  }
});
