@extends('layouts.header')

@section('content')
<div class="sidenav bg-dark d-none d-md-block col-md-2">
  @include('layouts.leftarea_user')
</div>
<div class="main mymessage col-xs-11 col-md-11 mt-3 container-fluid">
  <div class="row">
    <div class="col-md-8" id="messages">

    </div>
    <div class="col-md-4" id="users">
      <div class="user-wrapper">
        <ul class="users">
          @foreach($m_users as $user)
            @if($user->countMessage() > 0)
              <li class="user" id="{{ $user->id }}">
                @if($user->unreadMessages($user->id))
                  <span class="pending">{{ $user->unreadMessages($user->id) }}</span>
                @endif
                <div class="media">
                  <div class="media-left">
                    <img src="/img/user_profile/user_profile_{{ $user->id }}.jpg" alt="" class="media-object">
                  </div>
                  <div class="media-body">
                    <p class="name">{{ $user->name }}</p>
                    <p class="email">{{ $user->email }}</p>
                  </div>
                </div>
              </li>
            @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

<script>
  var receiver_id = '';
  var my_id="{{ Auth::id() }}";

  $(document).ready(function(){

    //ajax set form csrf_token
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('b75318841c86d558d960', {
      cluster: 'ap3',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));
      if(my_id == data.from){
        //sender
        $('#' + data.to).click();
      }
      else if(my_id == data.to){
        if(receiver_id == data.from){
          //if receiver is selected,reload the select user
          $('#' + data.from).click();
        }
        else{
          //if receiver is not selected, add notification for that user
          var pending = parseInt($('#' + data.from).find('.pending').html());
          //console.log(pending);
          if(pending){
            //alert('has unread');
            $('#' + data.from).find('.pending').html(pending + 1);
          }
          else{
            //alert('no unread');
            $('#' + data.from).append('<span class="pending">1</span>');
          }
        }
      }
    });

    //auto select user
    if("{{ session('to_id') }}"){
      receiver_id = "{{ session('to_id') }}";
      $('.mymessage .user').removeClass('active');
      $('#' + receiver_id).addClass('active');

      $.ajax({
        type: "get",
        url: "message/" + receiver_id,
        data: "",
        cache:false,
            success: function(data){
              $('.mymessage #messages').html(data);
              scrollToBottomFunc();
            }
      });
    }

    //select user
    $('.mymessage .user').click(function(){
      $('.mymessage .user').removeClass('active');
      $(this).addClass('active');
      var allunread = parseInt($('.unreadmessage').find('.pending').html());
      var thisunread = parseInt($(this).find('.pending').html());
      $(this).find('.pending').remove();


      //update left-list pendding
      if((allunread - thisunread) > 0)
      $('.unreadmessage').find('.pending').html(allunread - thisunread);
      else
      $('.unreadmessage').find('.pending').remove();

      receiver_id = $(this).attr('id');
      $.ajax({
        type: "get",
        url: "message/" + receiver_id,
        data: "",
        cache:false,
            success: function(data){
              $('.mymessage #messages').html(data);
              scrollToBottomFunc();
            }
      });
    });

    //send message
    $(document).on('keyup', '.input-text input', function (e){
      var message = $(this).val();

      //check if enter is pressed and message is not null and receiver is selected
      if(e.keyCode == 13 && message != '' && receiver_id != ''){
        $(this).val(''); //press enter and clear

        var datastr = "receiver_id=" + receiver_id + "&message=" + message;

        $.ajax({
          type: "post",
          url: "message",
          data: datastr,
          cache: false,
          success: function(data){

          },
          error: function(jqXHR, status, err){

          },
          complete: function(){
            scrollToBottomFunc();
          }
        })
      }
    });

    //make a function to scroll down auto
    function scrollToBottomFunc() {
      $('.mymessage .message-wrapper').animate({
        scrollTop: $('.mymessage .message-wrapper').get(0).scrollHeight}, 50);

        $('#messagetext').focus();
    }
  });
</script>
@endsection
