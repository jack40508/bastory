<div class="mt-5">
  <img class="profile-img-top" src="/img/team/logo/logo_{{ $team->id }}.jpg" alt="team_logo" style="width:25vh; height:25vh;">
  <h3 class="mt-2">{{ $team->name }}</h3>
  <div class="list-group list-group-flush">
    <a href="/team/{{ $team->id }}" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "event")
    active
    @endif">イベント</a>
    <a href="/team/{{ $team->id }}/member" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "member")
    active
    @endif">メンバー</a>
    <a href="/team/{{ $team->id }}/profile" class="list-group-item list-group-item-action list-group-item-light bg-dark
    @if ($nowpage == "profile")
    active
    @endif">プロフィール</a>
  </div>
</div>
