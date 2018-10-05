<?php

use Illuminate\Database\Seeder;
use App\Chatroom;

class ChatroomsTableSeeder extends Seeder
{
    public function run(){
      Chatroom::create([
        "id" => 1
      ]);
      
      Chatroom::create([
        "id" => 2
      ]);
    }
}
