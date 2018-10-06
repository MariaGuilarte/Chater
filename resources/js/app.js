
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
  el : "#app",
  data : {
    senderId : null,
    receiverId : null,
    chatroomId : null,
    message : {},
    messages : []
  },
  methods : {
    sendMessage : function(){
      if( this.message.body ){
        this.message.sender = this.senderId;
        this.message.receiver = this.receiverId;
        this.message.chatroom_id = this.chatroomId;
        axios.post("http://localhost/Chater/public/messages", this.message).then( (response)=>{
          this.messages.push( this.message );
          this.message = {};
          console.log(response);
        });
        console.log(this.message);
      }
    }
  },
  beforeMount(){
    this.senderId = document.querySelector('meta[name="sender-id"]').content;
    this.receiverId = document.querySelector('meta[name="receiver-id"]').content;
    this.chatroomId = document.querySelector('meta[name="chatroom-id"]').content;
    console.log("application about to be mounted");
  },
  mounted(){
    axios.get("http://localhost/Chater/public/messages/getMessages/" + this.receiverId).then( (response)=>{
      this.messages = response.data.data;
      console.log( "http://localhost/Chater/public/messages/getMessages/" + this.receiverId );
      console.log( response );
    });

    Echo.channel("chatroom."+this.chatroomId).listen(
      "CreatedMessage", (e)=>{
        console.log(e);
        console.log("Pueoecucha");
      }
    );

    console.log("application mounted");
  }
  }
);
