@extends('layouts.app')
@section('content')
<meta name="sender-id" content="{{ $sender_id }}">
<meta name="receiver-id" content="{{ $receiver_id }}">
<meta name="chatroom-id" content="{{ $chatroom_id }}">
<h1>Welcome to the chat room</h1>
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <div class="message-box">
          <span class="message"
                :class="{ right: m.sender_id == senderId }"
                v-for="m in messages">
          @{{ m.body }}
          </span>
        </div>
        <div class="form-group mb-0">
          <label for="message" class="d-none">Mensaje</label>
          <div class="input-group">
            <input type="text" class="form-control" id="message" v-model="message.body" autocomplete="off">
            <div class="input-group-append">
              <button type="button" class="btn btn-secondary" id="send" @click="sendMessage()">
                <i class="fa fa-paper-plane"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
