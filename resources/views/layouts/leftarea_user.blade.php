<div class="mt-5">
  <img class="profile-img-top" src="/img/user_profile/user_profile_{{ Auth::user()->id }}.jpg" alt="user_profile" style="width:20vh; height:20vh;">
  <h3 class="mt-2">{{ Auth::user()->name }}</h3>
  <div class="list-group list-group-flush left-user-list">
    <a href="/" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "event")
    active
    @endif">イベント</a>
    <a href="/myteam" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "team")
    active
    @endif">チーム</a>
    <a href="/myprofile" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "profile")
    active
    @endif">プロフィール</a>
    <a href="/post" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "post")
    active
    @endif">サインボード</a>
    <a href="/search" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "search")
    active
    @endif">サーチ</a>
    <a href="/message" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "message")
    active
    @endif">メッセージ
    <div class="unreadmessage float-right">
      @if(Auth::user()->allUnreadMessages())
      <span class="pending badge badge-danger badge-pill" id="allunread">{{ Auth::user()->allUnreadMessages() }}</span>
      @endif
    </div>
    </a>
  </div>
</div>

<script>
  $(document).ready(function(){
    var pusher = new Pusher('b75318841c86d558d960', {
      cluster: 'ap3',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));
      if({{ Auth::id() }} == data.to){
        var pending = parseInt($('.unreadmessage').find('.pending').html());

        if(pending){
          //alert('has unread');
          $('.unreadmessage').find('.pending').html(pending + 1);
        }
        else{
          //alert('no unread');
          $('.unreadmessage').append('<span class="pending" id="allunread">1</span>');
        }
      }
    });
  });
</script>
