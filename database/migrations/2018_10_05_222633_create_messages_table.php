<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    public function up(){
      Schema::create('messages', function (Blueprint $table) {
        $table->increments('id');
        $table->text('body');
        $table->unsignedInteger('chatroom_id');
        $table->foreign('chatroom_id')->references('id')->on('chatrooms');
        
        $table->unsignedInteger('sender');
        $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
        
        $table->unsignedInteger('receiver');
        $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');
        $table->timestamps();
      });
    }

    public function down(){
      Schema::dropIfExists('messages');
    }
}
