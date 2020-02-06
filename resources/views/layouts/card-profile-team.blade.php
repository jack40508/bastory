<div class="row">
  <div class="col-md-4 align-items-center">
    <img class="card-img-top" src="/img/team/logo/logo_{{ $team->id }}.jpg" alt="team_profile" style="max-width: 100%;">
  </div>
  <div class="col-md-8">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{ $team->area->name }}</li>
      <li class="list-group-item">{{ $team->leader->name }}</li>
      <li class="list-group-item">{{ $team->players->count() }}人</li>
      <li class="list-group-item">{{ $team->about }}</li>
    </ul>
  </div>
</div>
