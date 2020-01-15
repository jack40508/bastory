<div class="justify-content-center">
    <div class="card">
      <img class="card-img-top" src="/img/team/logo/logo_{{ $team->id }}.jpg" alt="team_logo" style="padding:10px;">
      <div class="card-body">
        <h4 class="card-title"><a href="/team/{{ $team->id }}">{{ $team->name }}</a></h4>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">エリア：{{ $team->area->name }}</li>
            <li class="list-group-item">レーダー：{{ $team->leader->name }}</li>
            <li class="list-group-item">メンバー数：{{ $team->players->count() }}人</li>
          </ul>
      </div>
    </div>
</div>
