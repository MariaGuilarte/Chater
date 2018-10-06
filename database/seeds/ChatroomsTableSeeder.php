<?php

use Illuminate\Database\Seeder;
use App\Chatroom;

class ChatroomsTableSeeder extends Seeder
{
    public function run(){
      Chatroom::create([
        "user_1" => 1,
        "user_2" => 2
      ]);
      
      Chatroom::create([
        "user_1" => 3,
        "user_2" => 4
      ]);
    }
}
