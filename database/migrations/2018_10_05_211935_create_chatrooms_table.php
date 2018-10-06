<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatroomsTable extends Migration
{
    public function up()
    {
      Schema::create('chatrooms', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('user_1');
        $table->foreign('user_1')->references('id')->on('users');
        
        $table->unsignedInteger('user_2');
        $table->foreign('user_2')->references('id')->on('users');
        $table->timestamps();
      });
    }

    public function down()
    {
      Schema::dropIfExists('chatrooms');
    }
}
