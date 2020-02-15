<div class="mt-5">
  <img class="profile-img-top" src="/img/user_profile/user_profile_{{ Auth::user()->id }}.jpg" alt="user_profile" style="width:20vh; height:20vh;">
  <h3 class="mt-2">{{ Auth::user()->name }}</h3>
  <div class="list-group list-group-flush">
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
    @endif">メッセージ</a>
  </div>
</div>
