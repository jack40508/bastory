<div class="container">
  <div class="justify-content-center">
      <div class="card card_profile">
        <img class="card-img-top" src="/img/team/logo/logo_{{ $team->id }}.jpg" alt="team_profile" style="padding:10px;">
        <div class="card-body">
          <h5 class="card-title">{{ $team->name }}</h5>
          <div class="list-group list-group-flush" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-event-list" data-toggle="list" href="#list-event" role="tab" aria-controls="event">イベント</a>
            <a class="list-group-item list-group-item-action" id="list-team-member" data-toggle="list" href="#list-member" role="tab" aria-controls="member">メンバー</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">プロフィール</a>
          </div>
        </div>
      </div>
  </div>
</div>
